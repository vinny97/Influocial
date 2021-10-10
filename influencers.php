<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/links.php'; ?>
    <title>Influencers | Influocial</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <main>
        <?php
          if(isset($_POST["submit"])) {
            $fname = filter_var($_POST["fname"], FILTER_SANITIZE_STRING);
            $lname = filter_var($_POST["lname"], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
            $instagram = filter_var($_POST["instagram"], FILTER_SANITIZE_STRING);
            $tiktok = filter_var($_POST["tiktok"], FILTER_SANITIZE_STRING);
            $youtube = filter_var($_POST["youtube"], FILTER_SANITIZE_STRING);
            
            $subject = "Contact Form from Influencers";
            $content = "Instagram: " . $instagram . "\nTiktok: " . $tiktok . "\nYoutube: " . $youtube;
            $toEmail = "info@influocial.co.uk";
            $mailHeaders = "From: " . $fname . " " . $lname . "<". $email .">\r\n";

            $conn = mysqli_connect("localhost", "influoci_influocial", "Clb#2021", "influoci_influocial");
            if($conn) {
              $query = "SELECT count(*) as allcount FROM influencers WHERE fname='".$fname."' && lname='".$lname."' && email='".$email."' && instagram='".$instagram."' && tiktok='".$tiktok."' && youtube='".$youtube."'";
              $result = mysqli_query($conn,$query);
              $row = mysqli_fetch_array($result);
              $allcount = $row['allcount'];
              if($allcount > 0){
                echo '<div class="container position-relative">
                  <div class="contact-toast" style="background: #dcac25">We have your info! <i class="fa fa-times" onclick="fadeRight()"></i></div>
                </div>';
              }
              else {
                mysqli_query($conn, "INSERT INTO influencers (fname, lname, email, instagram, tiktok, youtube) VALUES ('" . $fname. "','" . $lname. "', '" . $email. "','" . $instagram. "','" . $tiktok. "','" . $youtube. "')");
                $insert_id = mysqli_insert_id($conn);
                if(mail($toEmail, $subject, $content, $mailHeaders) && !empty($insert_id)) {
                  echo '
                  <div class="container position-relative">
                    <div class="contact-toast">Thank You! <i class="fa fa-times" onclick="fadeRight()"></i></div>
                  </div>
                  ';
                }
                else {
                  echo '
                  <div class="container position-relative">
                    <div class="contact-toast" style="background: #dc3545">Please try again! <i class="fa fa-times" onclick="fadeRight()"></i></div>
                  </div>
                  ';
                }
              }
            }
            else {
              echo '
              <div class="container position-relative">
                <div class="contact-toast" style="background: #dc3545">Please try again! <i class="fa fa-times" onclick="fadeRight()"></i></div>
              </div>
              ';
            }
          }
        ?>
      <section class="pentagonal-prism">
        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="blobSvg">
          <defs>
            <pattern id="pattern" x="0" y="0" width="100" height="20" patternUnits="userSpaceOnUse" fill="#e8bee0">
              <path d="M21.184 20c.357-.13.72-.264 1.088-.402l1.768-.661C33.64 15.347 39.647 14 50 14c10.271 0 15.362 1.222 24.629 4.928.955.383 1.869.74 2.75 1.072h6.225c-2.51-.73-5.139-1.691-8.233-2.928C65.888 13.278 60.562 12 50 12c-10.626 0-16.855 1.397-26.66 5.063l-1.767.662c-2.475.923-4.66 1.674-6.724 2.275h6.335zm0-20C13.258 2.892 8.077 4 0 4V2c5.744 0 9.951-.574 14.85-2h6.334zM77.38 0C85.239 2.966 90.502 4 100 4V2c-6.842 0-11.386-.542-16.396-2h-6.225zM0 14c8.44 0 13.718-1.21 22.272-4.402l1.768-.661C33.64 5.347 39.647 4 50 4c10.271 0 15.362 1.222 24.629 4.928C84.112 12.722 89.438 14 100 14v-2c-10.271 0-15.362-1.222-24.629-4.928C65.888 3.278 60.562 2 50 2 39.374 2 33.145 3.397 23.34 7.063l-1.767.662C13.223 10.84 8.163 12 0 12v2z"></path>
            </pattern>
          </defs>
          <path id="blob" d="M370.5,367Q250,484,135.5,367Q21,250,135.5,130Q250,10,370.5,130Q491,250,370.5,367Z" fill="url(#pattern)"></path>
        </svg>
        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="blobSvg">
          <path id="blob" d="M457,301.5Q429,353,392.5,393Q356,433,303,442.5Q250,452,199,439.5Q148,427,94.5,398.5Q41,370,21,310Q1,250,36,198.5Q71,147,106,104.5Q141,62,195.5,37.5Q250,13,310,28Q370,43,407.5,90.5Q445,138,465,194Q485,250,457,301.5Z" fill="#e8bee0"></path>
        </svg>
        <div class="pentagonal-prism__text">
          <div class="sub">Get paid</div>
          <div class="heading">To receive, use and create exciting content for products you love!</div>
          <div class="desc">
            <ul>
              <li>No Contract. No Gimmicks.</li>
              <li>Only authentic collabs!</li>
              <li>You’re always in control on our platform</li>
              <li>You choose the brands you want to work with</li>
              <li>Use Influocial to match with brands and create authentic content that you know your followers will love</li>
            </ul>
          </div>
        </div>
        </div>
        <div class="pentagonal-prism__scene">
          <div class="model">
            <img src="img/influencers/influencer-1.jpg" alt="" class="face">
            <img src="img/influencers/influencer-2.jpg" alt="" class="face">
            <img src="img/influencers/influencer-3.jpg" alt="" class="face">
            <img src="img/influencers/influencer-4.jpg" alt="" class="face">
            <img src="img/influencers/influencer-5.jpg" alt="" class="face">
          </div>
        </div>
        <div class="custom-shape-divider-bottom-1617659079">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
          </svg>
        </div>
      </section>

      <section class="video" style="padding-top: 300px; margin-top: 100px">
        <div class="custom-shape-divider-top-1617826508">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
          </svg>
        </div>
        <div class="container text-center position-relative">
          <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="zoomIn">
            <defs>
              <pattern id="pattern2" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse" fill="#becdf0">
                <path d="M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z"></path>
              </pattern>
            </defs>
            <path id="blob" d="M362.5,370Q250,490,126.5,370Q3,250,126.5,135.5Q250,21,362.5,135.5Q475,250,362.5,370Z" fill="url(#pattern2)"></path>
          </svg>
          <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="zoomIn">
            <path id="blob" d="M362.5,370Q250,490,126.5,370Q3,250,126.5,135.5Q250,21,362.5,135.5Q475,250,362.5,370Z" fill="#becdf0"></path>
          </svg>
          <div>
            <h2 class="heading__underline heading__underline--blue fadeUp">Why you should join</h2>
          </div>
          <video class="video__video insetFromTop" width="720" height="720" poster="img/influencers/influencers-poster.jpg" controls>
            <source src="img/influencers/influencers-video.mp4" type="video/mp4">
          Your browser does not support the video tag.
          </video>
        </div>
      </section>

      <section class="features features--influencers">
        <div class="container">
          <div class="text-center">
            <h2 class="heading__underline heading__underline--pink fadeUp">Our Features</h2>
          </div>
          
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-4">
                <div class="title">Create your own profile</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <img src="img/influencers/profile.png" alt="" class="feature-img fadeInFromRight">
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-4 order-lg-2">
                <div class="title">Add all your social accounts</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4 order-lg-1">
                <img src="img/influencers/social-accounts.png" alt="" class="feature-img fadeInFromLeft">
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12">
                <div class="title text-center">View and apply for any campaigns your interested in</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <img src="img/influencers/campaigns.png" alt="" class="feature-img fadeInFromLeft">
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4 ">
                <img src="img/influencers/campaign-brief.png" alt="" class="feature-img fadeInFromRight">
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-4 order-lg-2">
                <div class="title">Set your own rate</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4 order-lg-1">
                <img src="img/influencers/apply.png" alt="" class="feature-img fadeInFromLeft">
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-4">
                <div class="title">Chat to brands directly</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                <img src="img/influencers/chat.png" alt="" class="feature-img fadeInFromRight">
              </div>
            </div>
          </div>
        </div>
        <div class="feature">
          <div class="container">
            <div class="row g-lg-5 justify-content-center align-items-center">
              <div class="col-12 col-sm-10 col-md-8 col-lg-4 order-lg-2">
                <div class="title">Get paid</div>
              </div>
              <div class="col-10 col-sm-8 col-md-6 col-lg-4 order-lg-1">
                <img src="img/influencers/get-paid.png" alt="" class="feature-img fadeInFromLeft">
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="marketing">
        <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="zoomIn">
          <defs>
            <pattern id="pattern3" x="0" y="0" width="6" height="6" patternUnits="userSpaceOnUse" fill="#8e98b4">
              <path d="M5 0h1L0 6V5zM6 5v1H5z"></path>
            </pattern>
          </defs>
          <path id="blob" d="M362.5,370Q250,490,126.5,370Q3,250,126.5,135.5Q250,21,362.5,135.5Q475,250,362.5,370Z" fill="url(#pattern3)"></path>
        </svg>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="marketing__heading fadeUp">
                The Marketing Of A new generation
              </div>
            </div>
            <div class="col-12 col-md-10 col-lg-9 col-xl-8">
              <img src="img/influencers/macbook-iphone.png" alt="" class="zoomIn">
            </div>
          </div>
        </div>
      </section>

      <section class="contact-form contact-form--pink">
        <div class="container">
          
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-xxl-6">
              <form class="insetFromTop" action="" method="POST">
                <div class="text-center">
                  <h2 class="heading__underline heading__underline--pink">Register Today!</h2>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Name*</label>
                  <div class="row g-3 align-items-center">
                    <div class="col-6">
                      <input type="text" name="fname" class="form-control form-control-lg" id="fname" required minlength="2" maxlength="20" aria-describedby="fnameHelp">
                      <div id="fnameHelp" class="form-text">First Name</div>
                    </div>
                    <div class="col-6">
                      <input type="text" name="lname" class="form-control form-control-lg" id="lname" required minlength="2" maxlength="20" aria-describedby="lnameHelp">
                      <div id="lnameHelp" class="form-text">Last Name</div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" name="email" class="form-control form-control-lg" id="email" required aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Your email is safe with us.</div>
                </div>
                <div class="mb-3">
                  <label for="instagram" class="form-label">Instagram*</label>
                  <input type="text" name="instagram" class="form-control form-control-lg" id="instagram" required maxlength="50">
                </div>
                <div class="mb-3">
                  <div class="row g-3 align-items-center">
                    <div class="col-6">
                      <label for="tiktok" class="form-label">Tiktok</label>
                      <input type="text" name="tiktok" class="form-control form-control-lg" id="tiktok" maxlength="50">
                    </div>
                    <div class="col-6">
                      <label for="youtube" class="form-label">Youtube</label>
                      <input type="text" name="youtube" class="form-control form-control-lg" id="youtube" maxlength="50">
                    </div>
                  </div>
                </div>              
                <button type="submit" name="submit" class="btn btn-primary py-2 px-4 rounded-pill mt-4" style="background: #420035">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      window.onload = function() {
        onLoad();
        const face = document.querySelectorAll(".face");
        const pentagonalPrismText = document.querySelector(".pentagonal-prism__text").children;
        console.log(pentagonalPrismText);
        let tl = gsap.timeline();
        tl.from(face, {opacity: 0, stagger: 0.25})
        .from(".model", {rotateY: 360, rotateZ: -50, ease: "ease-out", duration: 1.25}, 0)
        .to(".pentagonal-prism__scene", {top: "100%"}, 1.25)
        .to(".model", {rotateX: 10}, 1.25)
        .from(pentagonalPrismText, {x: -100, opacity: 0, stagger: 0.25}, 1)
        .from(".blobSvg", {scale: 0, stagger: 0.25})
        .eventCallback("onComplete", completeHandler)

        function completeHandler() {
          document.querySelector(".model").classList.add("play");
        }

        let tl2 = gsap.timeline({
          scrollTrigger: {
            trigger: ".pentagonal-prism",
            start: "top top",
            end: "+=500",
            scrub: true
          }
        });
        tl2.to("html", {"--translateZ": "+=100px"})

      }
    </script>
  </body>
  <?php include 'includes/credit.php'; ?>
</html>