<?php 
    class Model{

		private $server = "host = ec2-23-20-208-173.compute-1.amazonaws.com";
        private $port = "port = 5432";
		private $credentials = "user = akitsuteixlbud password=61dc3e2c568a28b5817cb8c6abe04ab9d7165f41c03338c32a8acaefad5638d0";
		private $dbname = "dbname = d52snp06li4fb7";
		private $conn;

		public function __construct(){

			try {
				
				$this->conn = pg_connect("$this->server $this->port $this->dbname $this->credentials");
				$setSearchPath = "set search_path to 'workRDatabase'";
				$querySearchPath = pg_query($this->conn, $setSearchPath);
				session_start();
				
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		private function validate($data){

			$data = pg_escape_string($data);
			// $data = filter_var($data, FILTER_SANITIZE_STRING);
			//$data = html_entity_decode(strip_tags($data));
			// $data = htmlspecialchars($data);
			return $data;

		}

		public function signupJobSeeker(){

			if(isset($_POST['submit'])){
				if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])){
					if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])){

						$email = $this->validate($_POST['email']);
						$username = $this->validate($_POST['username']);
						// plaintext Password
						$passwordText = $this->validate($_POST['password']);
						// Hash password
						$password = md5($passwordText);
						$role = 2;
						
						// Test trung email || username
						$dupCheck = "SELECT * FROM jobseeker WHERE username = '$username' or email = '$email';";
						$queryCheck = pg_query($this->conn, $dupCheck);

						// Trung -> bat nhap lai
                        if (pg_num_rows($queryCheck) > 0) {

                            echo "<script>alert('Username || Email has been taken');</script>";
                            echo "<script>window.location.href = 'register.php';</script>";

						// Khong trung tao acc moi
						}else{

							$insertUser = "INSERT INTO jobseeker (email, password, role, username) VALUES ('$email', '$password', '$role', '$username')" ;
							$queryInsert = pg_query($this->conn, $insertUser);

							if($queryInsert){

								echo "<script>alert('Account create successfully');</script>";
								echo "<script>window.location.href = 'index.php';</script>";

							}else{

								echo "<script>alert('Query Failed');</script>";
								echo "<script>window.location.href = 'register.php';</script>";

							}
						}

					}else{

						echo "<script>alert('You cant leave Email || Username || Password empty');</script>";
						echo "<script>window.location.href = 'register.php';</script>";

					}
				}
			}
		}

		public function loginJobSeeker(){

			if(isset($_POST['submit'])){
				if(isset($_POST['email']) && isset($_POST['password'])){
					if(!empty($_POST['email']) && !empty($_POST['password'])){

						$email = $this->validate($_POST['email']);
						$passwordText = $this->validate($_POST['password']);
						$password = md5($passwordText);

						$loginCheck = "SELECT * FROM jobseeker WHERE email = '$email' and password = '$password';";
						$queryCheck = pg_query($this->conn, $loginCheck);

						if(pg_num_rows($queryCheck) === 1){

							$row = pg_fetch_assoc($queryCheck);
							if($row['email'] === $email && $row['password'] === $password){
								
								$_SESSION['userid'] = $row['id'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['avatar'] = $row['avatar'];
								$_SESSION['role'] = $row['role'];
								$_SESSION['username'] = $row['username'];
								$_SESSION['loggedin'] = true;
								echo "<script>alert('Login successfully');</script>";
								echo "<script>window.location.href = 'index.php';</script>";

							}else{

								echo "<script>alert('Invalid Email || Password');</script>";
								echo "<script>window.location.href = 'index.php';</script>";

							}

						}else{
							
							echo "<script>alert('Invalid Email || Password');</script>";
							echo "<script>window.location.href = 'index.php';</script>";

						}
						

					}else{

						echo "<script>alert('You cant leave Email || Password empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";

					}
				}
			}
		}
		
		public function createBlog(){
			if(isset($_POST['submit'])){
				if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['body'])){
					if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['body'])){

						$userid = (int)$_SESSION['userid'];
						$title = $this->validate($_POST['title']);
						$authorname = $this->validate($_POST['author']);
						$body = $this->validate($_POST['body']);

						$file = $_FILES['image'];
						$fileName = $file['name'];
						$fileTmpName = $file['tmp_name'];
						$fileSize = $file['size'];
						$fileError = $file['error'];
						$fileType = $file['type'];
						$fileExt = explode('.', $fileName);
						$fileActualExt = strtolower(end($fileExt));
						$allowed = array('jpg', 'jpeg', 'png');
						
						if(in_array($fileActualExt, $allowed)){

							if($fileError === 0){

								if($fileSize < 10000000 && $fileSize > 1000){
									
									$fileNameNew = uniqid('',true).".".$fileActualExt;
									$filenalDestination = './blogImages/'.$fileNameNew;
									move_uploaded_file($fileTmpName, $filenalDestination);

									$insertBlog = "INSERT INTO blog (userid, title, authorname, content, image) VALUES ('$userid', '$title', '$authorname', '$body', '$filenalDestination')" ;
									$queryInsert = pg_query($this->conn, $insertBlog);

									if($queryInsert){

										echo "<script>alert('Blog create successfully');</script>";
										echo "<script>window.location.href = 'careerblog.php';</script>";
				
									}else{
				
										echo "<script>alert('Query Failed');</script>";
										echo "<script>window.location.href = 'admin_dashboard_add.php';</script>";
				
									}

								}else{

									echo "<script>alert('Your file too fat or it is empty');</script>";
									echo "<script>window.location.href = 'admin_dashboard_add.php';</script>";

								}

							}else{

								echo "<script>alert('Error uploading file');</script>";
								echo "<script>window.location.href = 'admin_dashboard_add.php';</script>";

							}

						}else{

							echo "<script>alert('Your file must be jpg || jpeg || png');</script>";
							echo "<script>window.location.href = 'admin_dashboard_add.php';</script>";

						}

					}else{

						echo "<script>alert('You cant leave Title || Author || Body || Image empty');</script>";
						echo "<script>window.location.href = 'admin_dashboard_add.php';</script>";

					}

				}
			}
		}

        public function getPages(){

            $limit = 6;
            $countQuery = "SELECT count(id) as blognum from blog";
            $result = pg_query($this->conn,$countQuery);

            if(pg_num_rows($result) > 0){

                $blogs =  pg_fetch_all($result);
                $total = $blogs[0]['blognum'];
                return ceil($total/ $limit);

            }
        }

		public function fetchBlogs($page){

            $limit = 6;
            $start = ($page - 1) * $limit;
            $fetchall = "SELECT * FROM blog ORDER BY datecreated DESC LIMIT $limit OFFSET $start";
			$result = pg_query($this->conn, $fetchall);
			
            if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No blog');</script>";

			}

        }

		public function fetchAllBlogs(){
			$fetchall = "SELECT * FROM blog ORDER BY datecreated ASC";
			$result = pg_query($this->conn, $fetchall);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No blog');</script>";

			}
		}

		public function getBlogDetail($id){

			$getBlogbyID = "SELECT * FROM blog WHERE id = $id";
			$queryBlogID = pg_query($this->conn,$getBlogbyID);

			if(pg_num_rows($queryBlogID) > 0 ){

				return pg_fetch_assoc($queryBlogID);

			}else{

				return false;
				echo "<script>alert('No such blog');</script>";

			}

		}

		public function getRandBlogID($exclude){

			$getBlogID = "SELECT id FROM blog";
			$queryID = pg_query($this->conn,$getBlogID);

			if(pg_num_rows($queryID) > 0){	

				$blogIDarr = array();
				$blogIDObject = pg_fetch_all($queryID);
				
				foreach($blogIDObject as $blogID){
					array_push($blogIDarr, $blogID['id']);
				}

				// var_dump($blogIDarr);
				// Kiem id cua blog hien tai voi array
				$dupID = array_search($exclude, $blogIDarr);

				// var_dump($dupID);
				// Remove ID cua blog hien tai trong array ID
				unset($blogIDarr[$dupID]);
				// var_dump($blogIDarr);

				do{

					$randomNum = mt_rand(reset($blogIDarr),end($blogIDarr));

				}while(

					!in_array($randomNum, $blogIDarr)

				);
				// var_dump($randomNum);
				return $randomNum;
			}

		}

		public function deleteBlog($id){

			$deleteBlog = "DELETE FROM blog WHERE id = '$id'";
			$deleteQuery = pg_query($this->conn, $deleteBlog);

			if($deleteQuery){

				return true;

			}else{

				return false;

			}

		}

		public function updateBlog($id){
			if(isset($_POST['update'])){
				if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['body'])){
					if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['body'])){

						$userid = (int)$_SESSION['userid'];
						$title = $this->validate($_POST['title']);
						$authorname = $this->validate($_POST['author']);
						$body = $this->validate($_POST['body']);

						$file = $_FILES['image'];
						$fileName = $file['name'];
						$fileTmpName = $file['tmp_name'];
						$fileSize = $file['size'];
						$fileError = $file['error'];
						$fileType = $file['type'];
						$fileExt = explode('.', $fileName);
						$fileActualExt = strtolower(end($fileExt));
						$allowed = array('jpg', 'jpeg', 'png');
						
						if(in_array($fileActualExt, $allowed)){

							if($fileError === 0){

								if($fileSize < 10000000 && $fileSize > 1000){
									
									$fileNameNew = uniqid('',true).".".$fileActualExt;
									$filenalDestination = './blogImages/'.$fileNameNew;
									move_uploaded_file($fileTmpName, $filenalDestination);

									$updateBlog = "UPDATE blog SET userid= $userid, title= '$title', authorname= '$authorname', content= '$body', image='$filenalDestination' WHERE id = $id"; 
									$queryUpdate = pg_query($this->conn, $updateBlog);

									if($queryUpdate){

										echo "<script>alert('Blog update successfully');</script>";
										echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";
				
									}else{
				
										echo "<script>alert('Query Failed');</script>";
										echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";
				
									}

								}else{

									echo "<script>alert('Your file too fat or it is empty');</script>";
									echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";

								}

							}else{

								echo "<script>alert('Error uploading file');</script>";
								echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";

							}

						}else{

							echo "<script>alert('Your file must be jpg || jpeg || png');</script>";
							echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";

						}

					}else{

						echo "<script>alert('You cant leave Title || Author || Body || Image empty');</script>";
						echo "<script>window.location.href = 'admin_dashboard_blog.php';</script>";

					}

				}
			}
		}

    }




?>