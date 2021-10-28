<?php 
    class Model{

		private $server = "host = ec2-23-20-208-173.compute-1.amazonaws.com";
        private $port = "port = 5432";
		private $credentials = "user = akitsuteixlbud password=61dc3e2c568a28b5817cb8c6abe04ab9d7165f41c03338c32a8acaefad5638d0";
		private $dbname = "dbname = d52snp06li4fb7";
		private $conn;

		public $totalJobs;
		public $totalBlogs;
		public $totalJobSearch;
		public $totalEmployerJobs;
		public $totalFavoriteJobs;

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

// ------------------------------------- GET EVERYTHING FROM DATABASE ------------------------------------- //

		public function getCompany(){

			$fetch = "SELECT * FROM company";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Company');</script>";

			}

		}

		public function getCompanyOverview($id){

			$fetch = "SELECT * FROM company where id = $id";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_assoc($result);

            }else{

				return false;
				echo "<script>alert('No Company');</script>";

			}

		}

		public function getExperience(){

			$fetch = "SELECT * FROM experience;";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Experience');</script>";

			}

		}

		public function getIndustry(){

			$fetch = "SELECT * FROM industry";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Industry');</script>";

			}

		}

		public function getLevel(){

			$fetch = "SELECT * FROM level";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Level');</script>";

			}

		}

		public function getLocation(){

			$fetch = "SELECT * FROM location";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Location');</script>";

			}

		}

		public function getSalary(){

			$fetch = "SELECT * FROM salary";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Salary');</script>";

			}

		}

		public function getType(){

			$fetch = "SELECT * FROM type";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result) > 0) {

				return pg_fetch_all($result);

            }else{

				return false;
				echo "<script>alert('No Level');</script>";

			}

		}

		public function getJobSeeker($userid){
			
			$fetch = "SELECT email, username, avatar FROM jobseeker WHERE id = '$userid';";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result)){

				return pg_fetch_assoc($result);

			}else{

				return false;
				echo "<script>alert('No Jobseeker');</script>";

			}

		}

		public function getEmployer($userid){

			$fetch = "SELECT email FROM employer WHERE id = '$userid';";
			$result = pg_query($this->conn, $fetch);

			if(pg_num_rows($result)){

				return pg_fetch_assoc($result);

			}else{

				return false;
				echo "<script>alert('No Employer');</script>";

			}
		}


// ------------------------------------- END GET EVERYTHING FROM DATABASE ------------------------------------- //


// ------------------------------------- ALL SIGNUP / LOGIN ------------------------------------- //

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

		public function signupEmployer(){

			if(isset($_POST['submit'])){
				if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['companyid'])){
					if(!empty($_POST['email']) && !empty($_POST['password']) && $_POST['companyid'] != 0){

						$email = $this->validate($_POST['email']);
						
						// plaintext Password
						$passwordText = $this->validate($_POST['password']);
						// Hash password
						$password = md5($passwordText);

						$companyID = $this->validate($_POST['companyid']);
						$role = 3;
						
						// Test trung email || username
						$dupCheck = "SELECT * FROM employer WHERE email = '$email';";
						$queryCheck = pg_query($this->conn, $dupCheck);

						// Trung -> bat nhap lai
                        if (pg_num_rows($queryCheck) > 0) {

                            echo "<script>alert('Email has been taken');</script>";
                            echo "<script>window.location.href = 'register_employer.php';</script>";

						// Khong trung tao acc moi
						}else{
							
							$insertUser = "INSERT INTO employer (email, password, role, companyid) VALUES ('$email', '$password', '$role', '$companyID')" ;
							$queryInsert = pg_query($this->conn, $insertUser);

							if($queryInsert){

								echo "<script>alert('Account create successfully');</script>";
								echo "<script>window.location.href = 'login_employer.php';</script>";

							}else{

								echo "<script>alert('Query Failed');</script>";
								echo "<script>window.location.href = 'register_employer.php';</script>";

							}

						}

					}else{

						echo "<script>alert('You cant leave Email || Company || Password empty');</script>";
						echo "<script>window.location.href = 'register_employer.php';</script>";
					}
				}
			}
		}

		public function loginEmployer(){

			if(isset($_POST['submit'])){
				if(isset($_POST['email']) && isset($_POST['password'])){
					if(!empty($_POST['email']) && !empty($_POST['password'])){

						$email = $this->validate($_POST['email']);
						$passwordText = $this->validate($_POST['password']);
						$password = md5($passwordText);

						$loginCheck = "SELECT * FROM employer WHERE email = '$email' and password = '$password';";
						$queryCheck = pg_query($this->conn, $loginCheck);

						if(pg_num_rows($queryCheck) === 1){

							$row = pg_fetch_assoc($queryCheck);
							if($row['email'] === $email && $row['password'] === $password){
								
								$_SESSION['userid'] = $row['id'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['avatar'] = $row['avatar'];
								$_SESSION['role'] = $row['role'];
								$_SESSION['companyid'] = $row['companyid'];
								$_SESSION['loggedin'] = true;
								echo "<script>alert('Login successfully');</script>";
								echo "<script>window.location.href = 'index.php';</script>";

							}else{

								echo "<script>alert('Invalid Email || Password');</script>";
								echo "<script>window.location.href = 'login_employer.php';</script>";

							}

						}else{
							
							echo "<script>alert('Invalid Email || Password');</script>";
							echo "<script>window.location.href = 'login_employer.php';</script>";

						}
						

					}else{

						echo "<script>alert('You cant leave Email || Password empty');</script>";
						echo "<script>window.location.href = 'login_employer.php';</script>";

					}
				}
			}
		}

// ------------------------------------- END ALL SIGNUP / LOGIN ------------------------------------- //

// ------------------------------------- ALL ADMIN FUNCTION ------------------------------------- //

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

        public function getPagesBlog(){

            $limit = 6;
            $countQuery = "SELECT count(id) as blognum from blog";
            $result = pg_query($this->conn,$countQuery);

            if(pg_num_rows($result) > 0){

                $blogs =  pg_fetch_all($result);
                $total = $blogs[0]['blognum'];
				$this->totalBlogs = $total;
                return ceil($total/ $limit);

            }
        }

		public function getBlogs($page){

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

		public function getAllBlogs(){
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

		public function manageReviews(){
			
			$fetchall = "SELECT cr.id, cr.content, co.companyname, cr.datecreated, cr.companyid FROM companyreview cr, company co WHERE cr.companyid = co.id ORDER BY datecreated DESC";
			$results = pg_query($this->conn, $fetchall);

			if(pg_num_rows($results) > 0){

				return pg_fetch_all($results);

			}else{

				return false;
				echo "<script>alert('No Reviews');</script>";

			}

		}

		public function deleteReview($id){

			$deleteReview= "DELETE FROM companyreview WHERE id = '$id'";
			$deleteQuery = pg_query($this->conn, $deleteReview);

			if($deleteQuery){

				return true;

			}else{

				return false;

			}

		}

// ------------------------------------- END ALL ADMIN FUNCTION ------------------------------------- //
			
// ------------------------------------- ALL CREATE FUNCTION ------------------------------------- //

		public function createCompany(){
			if (isset($_POST['submit'])) {
				if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['website']) && isset($_POST['applyemail']) && isset($_POST['size']) &&  isset($_POST['logo']) && isset($_POST['body']) ) {
					if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['website']) && !empty($_POST['applyemail']) && !empty($_POST['size']) && !empty($_POST['logo']) && !empty($_POST['body'])) {
						$name = $this->validate($_POST['name']);
						$address = $this->validate($_POST['address']);
						$website = $this->validate($_POST['website']);
						$applyemail = $this->validate($_POST['applyemail']);
						$size = $this->validate($_POST['size']);
						$logo = $this->validate($_POST['logo']);
						$description = $this->validate($_POST['body']);

						$insertCompany = "INSERT INTO company (companyname, address, website, applyemail, companydescription, logo, size) VALUES ('$name', '$address', '$website', '$applyemail', '$description', '$logo', '$size')";
						$queryInsert = pg_query($this->conn, $insertCompany);
						
						if ($queryInsert) {
							echo "<script>alert('Company create successfully');</script>";
						} else {
							echo "<script>alert('Query Failed');</script>";
						}
					// check empty 3 text box
					if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['requirements']) && !empty($_POST['enddate']) && 
					// check option
					$_POST['company'] != 0 && $_POST['industry'] != 0 && $_POST['salary'] != 0
					&& $_POST['experience'] != 0 && $_POST['type'] != 0 && $_POST['level'] != 0 && $_POST['location'] != 0) {

						// 3 text box
						$title = $this->validate($_POST['title']);
						$description = $this->validate($_POST['description']);
						$requirements = $this->validate($_POST['requirements']);
						$enddate = $this->validate($_POST['enddate']);
						// option
						$company = $this->validate($_POST['company']);
						$industry = $this->validate($_POST['industry']);
						$salary = $this->validate($_POST['salary']);
						$experience = $this->validate($_POST['experience']);
						$type = $this->validate($_POST['type']);
						$level = $this->validate($_POST['level']);
						$location = $this->validate($_POST['location']);
						$userid = $_SESSION['userid'];

						$insertJob = "INSERT INTO job (title, requirements, description, startdate, enddate, companyid, industryid, experienceid, salaryid, typeid, levelid, locationid, userid) 
										VALUES ('$title', '$requirements','$description', 'now()', '$enddate', '$company', '$industry', '$experience', '$salary', '$type', '$level', '$location', '$userid')";

						$queryInsert = pg_query($this->conn, $insertJob);
						
						if ($queryInsert) {
							echo "<script>alert('Job create successfully');</script>";
						} else {
							echo "<script>alert('Query Failed');</script>";
						}

					} else {
						echo "<script>alert('empty');</script>";
					}
				}
			}
		}
	}

// ------------------------------------- END CREATE FUNCTION ------------------------------------- //

// ------------------------------------- JOBLIST AND JOBDETAIL PAGE FUNCTION ------------------------------------- //

		public function getPagesJobs(){

            $limit = 5;
            $countQuery = "SELECT count(jobid) as jobnum from job;";
            $result = pg_query($this->conn,$countQuery);

            if(pg_num_rows($result) > 0){

                $jobs =  pg_fetch_all($result);
                $total = $jobs[0]['jobnum'];
				$this->totalJobs = $total;
                return ceil($total/ $limit);

            }else{

				echo "<script>alert('empty');</script>";

			}
        }

		public function getJobs($page){

			$start = ($page - 1) * 5;

			$fetchJobs = "SELECT * 
							FROM job j, company c, industry i, experience e, salary s, type t, level l, location lo 
							WHERE j.companyid = c.id and j.industryid = i.id and j.experienceid = e.id and j.salaryid = s.id and j.typeid = t.id and j.levelid = l.id and j.locationid = lo.id
							ORDER BY startdate DESC OFFSET $start;";

			$results = pg_query($this->conn, $fetchJobs);

			if(pg_num_rows($results) > 0){

				return pg_fetch_all($results);

			}

			else{

				echo "<script>alert('no jobs');</script>";

			}

		}

		public function getDetailJob($id){

			$fetchJob = "SELECT * 
							FROM job j, company c, industry i, experience e, salary s, type t, level l, location lo 
							WHERE j.jobid = $id and j.companyid = c.id and j.industryid = i.id and j.experienceid = e.id and j.salaryid = s.id and j.typeid = t.id and j.levelid = l.id and j.locationid = lo.id;";

			$result = pg_query($this->conn, $fetchJob);

			if(pg_num_rows($result) > 0){

				return pg_fetch_assoc($result);

			}else{

				return false;
				echo "<script>alert('No such blog');</script>";

			}

		}

		public function favoriteJob($jobid, $userid){

				// Check user da favorite chua
				$favoriteCheck = "SELECT * FROM favoritejob WHERE jobid = '$jobid' AND userid = '$userid'";
				$queryCheck = pg_query($this->conn, $favoriteCheck);

				if(pg_num_rows($queryCheck) > 0){

					return false;
				
				// Neu chua thi favorite (true = co the favorite | false = da favorite)
				}else{

					if(isset($_POST['favorite'])){

                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 2) {

                            $favoriteQuery = "INSERT INTO favoritejob (jobid, userid) VALUES ('$jobid', '$userid')";
                        
                            $queryFavorite = pg_query($this->conn, $favoriteQuery);
            
                            if ($queryFavorite) {

                                echo "<script>alert('Favorite job successfully');</script>";

                            } else {

                                echo "<script>alert('queryFail');</script>";

                            }

                        }else{

							echo "<script>alert('You have to be a jobseeker to favorite job');</script>";
							return true;

						}

					}else{

						return true;

                    }
				}

		}

		public function favoriteCompany($companyid, $userid){

			// Check user da favorite chua
			$favoriteCheck = "SELECT * FROM favoritecompany WHERE companyid = '$companyid' AND userid = '$userid'";
			$queryCheck = pg_query($this->conn, $favoriteCheck);

			if(pg_num_rows($queryCheck) > 0){

				return false;
			
			// Neu chua thi favorite (true = co the favorite | false = da favorite)
			}else{

				if(isset($_POST['favoritecompany'])){

					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 2) {

						$favoriteQuery = "INSERT INTO favoritecompany (companyid, userid) VALUES ('$companyid', '$userid')";
					
						$queryFavorite = pg_query($this->conn, $favoriteQuery);
		
						if ($queryFavorite) {

							echo "<script>alert('Favorite company successfully');</script>";

						} else {

							echo "<script>alert('queryFail');</script>";

						}

					}else{

						echo "<script>alert('You have to be a jobseeker to favorite company');</script>";
						return true;

					}

				}else{

					return true;

				}
			}

	}

// ------------------------------------- END JOBLIST AND JOBDETAIL PAGE FUNCTION ------------------------------------- //

// ------------------------------------- SEARCH BAR FUNCTION ------------------------------------- //

		public function searchBar(){

            if (isset($_POST['submit'])) {
                if ($_POST['companyid'] != 0 || $_POST['typeid'] != 0 || $_POST['locationid'] != 0 ||
                    $_POST['salaryid'] != 0 || $_POST['experienceid'] != 0 || $_POST['industryid'] != 0) {
						
                    $select = ["companyid","typeid","locationid","salaryid","experienceid","industryid"];

                    $validSelect = [];

                    foreach ($select as $key) {
                        $value = $_POST[$key];
                        if ($value != 0) {
                            array_push($validSelect, $key);
                        }
                    }

                    $whereString = "WHERE j.companyid = c.id and j.industryid = i.id and j.experienceid = e.id and j.salaryid = s.id and j.typeid = t.id and j.levelid = l.id and j.locationid = lo.id and ";

                    // key = companyid/levelid/locationid
                    // $_POST[$key] la value cua tung thang
                    foreach ($validSelect as $key) {
                        $whereString .= "$key = $_POST[$key] and ";
                    }
					
					// Cat chu "and" cuoi query
                    $finalWhere = substr($whereString, 0, -5);

                    $fetchSearch = "SELECT * FROM job j, company c, industry i, experience e, salary s, type t, level l, location lo " . $finalWhere;
					
					// Dem so luong search tim duoc
					$countSearch = "SELECT count(j.jobid) FROM job j, company c, industry i, experience e, salary s, type t, level l, location lo " . $finalWhere;

					// Dem tong luong rows search duoc
					$searchResult = pg_query($this->conn,$countSearch);
					$searchNum = pg_fetch_assoc($searchResult);
					$this->totalJobSearch = $searchNum['count'];

					// in ra ket qua search
					$results = pg_query($this->conn, $fetchSearch);

					if(pg_num_rows($results) > 0){

						return pg_fetch_all($results);

					}else{

						echo "<script>alert('Your search return none');</script>";
						return false;

					}

                }else{

					echo "<script>alert('You can\'t leave everything empty');</script>";

				}

            }
			
		}

// ------------------------------------- END SEARCH BAR FUNCTION ------------------------------------- //

// ------------------------------------- EMPLOYER DASHBOARD ------------------------------------- //

	public function countTotalJob($userid){

		$countQuery = "SELECT COUNT(jobid) OVER(), startdate FROM job WHERE userid = $userid GROUP BY jobid, startdate ORDER BY startdate DESC LIMIT 1;";
		$result = pg_query($this->conn, $countQuery);

		if(pg_num_rows($result) > 0){

			return pg_fetch_assoc($result);

		}else{

			return false;
			echo "<script>alert('No result');</script>";

		}

	}

	public function createJob(){

		if (isset($_POST['submit'])) {
			// check set 3 text box
			if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['requirements']) && isset($_POST['enddate'])
			// check set option
			&& isset($_POST['company']) && isset($_POST['industry']) && isset($_POST['salary']) 
			&& isset($_POST['experience']) && isset($_POST['type']) &&  isset($_POST['level']) && isset($_POST['location']) ) {

				// check empty 3 text box
				if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['requirements']) && !empty($_POST['enddate']) && 
				// check option
				$_POST['company'] != 0 && $_POST['industry'] != 0 && $_POST['salary'] != 0
				&& $_POST['experience'] != 0 && $_POST['type'] != 0 && $_POST['level'] != 0 && $_POST['location'] != 0) {

					// 3 text box
					$title = $this->validate($_POST['title']);
					$description = $this->validate($_POST['description']);
					$requirements = $this->validate($_POST['requirements']);
					$enddate = $this->validate($_POST['enddate']);
					// option
					$company = $this->validate($_POST['company']);
					$industry = $this->validate($_POST['industry']);
					$salary = $this->validate($_POST['salary']);
					$experience = $this->validate($_POST['experience']);
					$type = $this->validate($_POST['type']);
					$level = $this->validate($_POST['level']);
					$location = $this->validate($_POST['location']);
					$userid = $_SESSION['userid'];

					$insertJob = "INSERT INTO job (title, requirements, description, startdate, enddate, companyid, industryid, experienceid, salaryid, typeid, levelid, locationid, userid) 
									VALUES ('$title', '$requirements','$description', 'now()', '$enddate', '$company', '$industry', '$experience', '$salary', '$type', '$level', '$location', '$userid')";

					$queryInsert = pg_query($this->conn, $insertJob);
					
					if ($queryInsert) {
						echo "<script>alert('Job create successfully');</script>";
					} else {
						echo "<script>alert('Query Failed');</script>";
					}

				} else {
					echo "<script>alert('empty');</script>";
				}
			}
		}
		
	}

	public function updateCompany($companyID){

		if(isset($_POST['submit'])){

			if(isset($_POST['name']) && isset($_POST['logo']) && isset($_POST['address']) && isset($_POST['website']) && isset($_POST['email']) && isset($_POST['size']) && isset($_POST['description'])){

				if(!empty($_POST['name']) && !empty($_POST['logo']) && !empty($_POST['address']) && !empty($_POST['website']) && !empty($_POST['email']) && !empty($_POST['size']) && !empty($_POST['description'])){
					
					$companyname = $this->validate($_POST['name']);
					$companylogo = $this->validate($_POST['logo']);
					$companyaddress = $this->validate($_POST['address']);
					$companywebsite = $this->validate($_POST['website']);
					$companyemail = $this->validate($_POST['email']);
					$companysize = $this->validate($_POST['size']);
					$companydescription = $this->validate($_POST['description']);

					$updateQuery = "UPDATE company
									SET companyname='$companyname', address='$companyaddress', website='$companywebsite', applyemail='$companyemail', companydescription='$companydescription', logo='$companylogo', size='$companysize'
									WHERE id = $companyID;";

					$queryUpdate = pg_query($this->conn, $updateQuery);

					if($queryUpdate){

						echo "<script>alert('Company update successfully');</script>";
						echo "<script>window.location.href = 'employer_CD.php';</script>";

					}else{

						echo "<script>alert('Query Failed');</script>";

					}

				}else {

					echo "<script>alert('empty');</script>";

				}
			}
		}
	}

	public function getAllEmployerJobs($userid){

		$this->totalEmployerJobs = $this->countTotalJob($userid);

		$getAllJobs = "SELECT * FROM job j, employer e WHERE e.id = '$userid' and e.id = j.userid ORDER BY startdate desc;";
		$results = pg_query($this->conn, $getAllJobs);

		if(pg_num_rows($results) > 0){

			return pg_fetch_all($results);

		}else{

			return false;
			echo "<script>alert('No Jobs');</script>";

		}

	}

	public function deleteJob($jobid){

		$deleteJob = "DELETE FROM job WHERE jobid = '$jobid'";
		$deleteQuery = pg_query($this->conn, $deleteJob);

		if($deleteQuery){

			return true;

		}else{

			return false;

		}

	}
	
// ------------------------------------- END EMPLOYER DASHBOARD ------------------------------------- //

// ------------------------------------- JOBSEEKER DASHBOARD ------------------------------------- //
	
	public function countFavoriteJob($userid){

		$countFavoriteJob = "SELECT count(id) FROM favoritejob WHERE userid = '$userid';";

		$result = pg_query($this->conn, $countFavoriteJob);

		if(pg_num_rows($result) > 0) {

			return pg_fetch_assoc($result);

		}else{

			return false;
			echo "<script>alert('No result');</script>";

		}

	}

	public function getFavoriteJob($userid){

		$this->totalFavoriteJobs = $this->countFavoriteJob($userid);

		$getFavoriteJob = "SELECT * FROM jobseeker js, favoritejob fj, job j WHERE js.id = '$userid' AND fj.userid = js.id AND fj.jobid = j.jobid  ORDER BY startdate DESC;";

		$results = pg_query($this->conn, $getFavoriteJob);

		if(pg_num_rows($results) > 0){

			return pg_fetch_all($results);

		}else{

			return false;
			echo "<script>alert('No Favorite Jobs');</script>";

		}

	}

	public function deleteFavoriteJob($jobid){

		$deleteFavoriteJob = "DELETE FROM favoritejob WHERE jobid = '$jobid'";
		$deleteQuery = pg_query($this->conn, $deleteFavoriteJob);

		if($deleteQuery){

			return true;

		}else{

			return false;

		}

	}
	
	public function getFavoriteCompany($userid){

		$getFavoriteCompany = "SELECT * FROM favoritecompany fc, company co, jobseeker js WHERE js.id = '$userid' AND fc.userid = js.id AND fc.companyid = co.id;";

		$results = pg_query($this->conn, $getFavoriteCompany);

		if(pg_num_rows($results) > 0){

			return pg_fetch_all($results);

		}else{

			return false;
			echo "<script>alert('No Favorite Company');</script>";

		}

	}

	public function deleteFavoriteCompany($companyid){

		$deleteFavoriteCompany = "DELETE FROM favoritecompany WHERE companyid = '$companyid'";
		$deleteQuery = pg_query($this->conn, $deleteFavoriteCompany);

		if($deleteQuery){

			return true;

		}else{

			return false;

		}

	}

	public function userReviews($userid){

		$fetchall = "SELECT cr.id, fe.name, cr.content, co.companyname, cr.datecreated, cr.companyid 
						FROM companyreview cr, company co, feeling fe 
							WHERE cr.user_id = '$userid' AND cr.companyid = co.id AND cr.feeling = fe.id ORDER BY datecreated DESC;";
		$results = pg_query($this->conn, $fetchall);

		if(pg_num_rows($results) > 0){

			return pg_fetch_all($results);

		}else{

			return false;
			echo "<script>alert('No Reviews');</script>";

		}

	}
// ------------------------------------- END JOBSEEKER DASHBOARD ------------------------------------- //

// ------------------------------------- REVIEW  ------------------------------------- //

	public function createReview($userid, $companyid){

        if (isset($_POST['review'])) {

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 2) {

				if(isset($_POST['inlineRadioOptions']) && isset($_POST['message'])){

					if(!empty($_POST['inlineRadioOptions']) && !empty($_POST['message'])){
						
						$feeling = $this->validate($_POST['inlineRadioOptions']);
						$message = $this->validate($_POST['message']);

						$insertReview = "INSERT INTO companyreview (user_id, companyid, content, feeling) VALUES ('$userid', '$companyid', '$message', '$feeling')";
						$queryInsert = pg_query($this->conn, $insertReview);

						if($queryInsert){

							echo "<script>alert('Review create successfully');</script>";
							echo "<script>window.location.href = 'comp_review_details.php?id=$companyid';</script>";

						}else{

							echo "<script>alert('Review create fail');</script>";
							
						}

					}else{

						echo "<script>alert('You cant leave Feeling || Message empty');</script>";

					}

				}else{

					echo "<script>alert('You cant leave Feeling || Message empty');</script>";

				}

			}else{

				echo "<script>alert('You have to be a jobseeker to review company');</script>";

			}

        }



	}

	public function getReviews($companyid){
		
		$getReviews = "SELECT * FROM companyreview cr, jobseeker j, company co, feeling f WHERE co.id = '$companyid' AND cr.user_id = j.id AND cr.companyid = co.id AND cr.feeling = f.id;";

		$results = pg_query($this->conn, $getReviews);

		if(pg_num_rows($results) > 0){

			return pg_fetch_all($results);

		}else{

			return false;
			echo "<script>alert('No Review');</script>";

		}
	}

// ------------------------------------- END REVIEW ------------------------------------- //

}	

?>