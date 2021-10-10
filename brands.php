<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/links.php'; ?>
    <title>Brands | Influocial</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <main>
      <?php
        if(isset($_POST["submit"])) {
          $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
          $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
          $website = filter_var($_POST["website"], FILTER_SANITIZE_STRING);
          $company = filter_var($_POST["company"], FILTER_SANITIZE_STRING);
          $country = filter_var($_POST["country"], FILTER_SANITIZE_STRING);
          $number = filter_var($_POST["number"], FILTER_SANITIZE_STRING);
          $budget = filter_var($_POST["budget"], FILTER_SANITIZE_STRING);
          $hear = filter_var($_POST["hear"], FILTER_SANITIZE_STRING);
          
          $subject = "Contact Form from Brands";
          $content = "Website: " . $website . "\nCompany: " . $company . "\nNumber: +" . $country . "-" . $number . "\nBudget: £" . $budget . "\nHeared from: " . $hear;
          $toEmail = "info@influocial.co.uk";
          $mailHeaders = "From: " . $name . "<". $email .">\r\n";

          $conn = mysqli_connect("localhost", "influoci_influocial", "Clb#2021", "influoci_influocial");
          if($conn) {
            $query = "SELECT count(*) as allcount FROM brands WHERE name='".$name."' && email='".$email."' && website='".$website."' && company='".$company."' && country='".$country."' && number='".$number."' && budget='".$budget."' && hear='".$hear."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $allcount = $row['allcount'];
            if($allcount > 0){
              echo '<div class="container position-relative">
                <div class="contact-toast" style="background: #dcac25">We have your info! <i class="fa fa-times" onclick="fadeRight()"></i></div>
              </div>';
            }
            else {
              mysqli_query($conn, "INSERT INTO brands (name, email, website, company, country, number, budget, hear) VALUES ('" . $name. "','" . $email. "','" . $website. "', '" . $company. "','" . $country. "','" . $number. "','" . $budget. "','" . $hear. "')");
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
      <section class="cards-3d">
        <div class="container">
          <div class="row justify-content-center justify-content-lg-between align-items-center gy-5">
            <div class="col-12 col-lg-6 order-lg-2">
              <div class="scene">
                <img src="img/brands/brands-1.png" alt="" class="scene__img">
                <img src="img/brands/brands-2.png" alt="" class="scene__img">
                <img src="img/brands/brands-3.png" alt="" class="scene__img">
                <img src="img/brands/brands-4.png" alt="" class="scene__img">
                <img src="img/icons/comments.svg" alt="" class="scene__symbol">
                <img src="img/icons/follows.svg" alt="" class="scene__symbol">
                <img src="img/icons/likes-1.svg" alt="" class="scene__symbol">
                <img src="img/icons/likes-2.svg" alt="" class="scene__symbol">
                <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg">
                  <path id="blob" d="M406,336Q349,422,245,430.5Q141,439,76,344.5Q11,250,72.5,149.5Q134,49,233.5,78Q333,107,398,178.5Q463,250,406,336Z" fill="#f0f4ff"></path>
                </svg>
              </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 col-lg-6 order-lg-1" style="z-index: 9">
              <div class="brands-hero">
                <h1>Receive Exclusive Branded Content with Influocial’s Powerful All-in-one Software</h1>
                <h2>Branded content that hits your KPI, improves your ROI, greater CPI and returns greater engagement rate</h2>
                <a href="#contact-brands">Get Started</a>
                <img src="img/graphics/arrow.png" alt=""class="arrows">
                <img src="img/graphics/arrow.png" alt=""class="arrows">
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="video video--red" style="padding-bottom: 150px">
        <div class="container text-center position-relative">
          <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="zoomIn">
            <defs>
              <pattern id="pattern2" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse" fill="#e7a7b4">
                <path d="M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z"></path>
              </pattern>
            </defs>
            <path id="blob" d="M362.5,370Q250,490,126.5,370Q3,250,126.5,135.5Q250,21,362.5,135.5Q475,250,362.5,370Z" fill="url(#pattern2)"></path>
          </svg>
          <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" class="zoomIn">
            <path id="blob" d="M362.5,370Q250,490,126.5,370Q3,250,126.5,135.5Q250,21,362.5,135.5Q475,250,362.5,370Z" fill="#e7a7b4"></path>
          </svg>
          <div>
            <h2 class="heading__underline heading__underline--red mb-5 fadeUp">Receive Exclusive...</h2>
            <h3 class="subheading">Content for your brand from our influencers and if you like it then approve it, simple as that!</h3>
          </div>
          <video class="video__video insetFromTop" width="720" height="720" poster="img/brands/brands-poster.jpg" controls>
            <source src="img/brands/brands-video.mp4" type="video/mp4">
          Your browser does not support the video tag.
          </video>
        </div>
      </section>


      <section class="accordion-h">
        <div class="container">
          <div class="text-center">
            <h2 class="heading__underline heading__underline--blue fadeUp">How it works</h2>
          </div>
          <div class="text-center">
            <div class="accordion-h__links fadeUp">
              <a href="" class="accordion-h__link active">Profile</a>
              <a href="" class="accordion-h__link">Campaign</a>
              <a href="" class="accordion-h__link">Proposals</a>
              <a href="" class="accordion-h__link">Discover</a>
              <a href="" class="accordion-h__link">Submission</a>
              <a href="" class="accordion-h__link">Performance</a>
            </div>
          </div>
          <div class="accordion-h__items">
            <svg xmlns="http://www.w3.org/2000/svg" width="742" viewBox="0 0 742 667">
              <g fill="none" fill-rule="evenodd" opacity=".29">
                <path fill="#0336b9" d="M673.948067,490.926054 C645.403974,624.028517 409.425517,660.481014 263.587183,641.184854 C115.79537,620.197483 14.6836434,324.894915 70.6440805,179.885476 C123.397922,31.6939604 396.161132,6.42659099 531.391012,25.5655738 C672.367522,38.2560954 708.119041,349.86251 673.948067,490.926054 Z" class="back-shape" style="opacity: 0.3"></path>
                <path fill="#0336b9" d="M675.373117,371.537921 C697.099233,506.257227 496.60346,630.009512 349.845192,635.646314 C210.043717,645.25824 53.9880187,456.9803 64.5038073,311.916776 C85.049391,160.558916 303.191552,40.091656 453.234524,51.7849473 C602.778466,58.8384061 653.573809,237.000051 675.373117,371.537921 Z" class="front-shape" style="opacity: 0.3"></path>
              </g>
            </svg>
            <div class="accordion-h__item active">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/profile.png" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-0 g-xl-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Create your profile</div>
                        <div class="desc">Fill out your brand information so influencers get a good idea of what brand they will be working with</div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Add multiple brands</div>
                        <div class="desc">If you want to manage another brand, simply create the profile and start creating campaigns for that brand</div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Manage all brands easily</div>
                        <div class="desc">Our platform makes it easy for you to create manage multiple brands</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-h__item">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/campaign.png" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Create campaigns</div>
                        <div class="desc">Create a campaign within 5 minutes</div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Choose influencer campaign or Shoutout</div>
                        <div class="desc">Influencer campaigns the influencer will create the content for you and publish it. In a shoutout campaign the influencer will simply publish the content you provide to 1000's of their followers for quick ROI and reach.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-h__item">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/proposals.png" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Receive applications from a variety of influencers</div>
                        <div class="desc">View all the proposals in one place</div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Easily filter the applications to find suitable ones</div>
                        <div class="desc">Filter by social channels, age, followers, engagement rate and more</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-h__item">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/discover.png" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Vet influencers and creators</div>
                        <div class="desc">Find your perfect influencer with confidence. View their location, demographics, interests, target audience, portfolio, social channels, engagement, followers, CPE and much more!</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-h__item">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/submission.jpg" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">It's all in your hands</div>
                        <div class="desc">Once you have selected an influencer, they will send you the content and its up to you to either accept the submission, ask for modifications or decline it.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-h__item">
              <div class="row">
                <div class="col-12 col-lg-6 order-lg-2 text-center">
                  <img src="img/brands/performance.png" alt="">
                </div>
                <div class="col-12 col-lg-6 order-lg-1">
                  <div class="row g-5">
                    <div class="col-12 col-sm-6">
                      <div class="accordion-h__card">
                        <div class="icon">
                          <i class="fa fa-bars fa-lg fa-fw"></i>
                        </div>
                        <div class="title">Measure</div>
                        <div class="desc">View over 10 different performance metrics every step of the campaign</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="features features--brands">
        <div class="container">
          <div class="text-center">
            <h2 class="heading__underline heading__underline--red fadeUp">Our Features</h2>
          </div>
          <p class="first fadeUp">Our platform allows you to execute your marketing strategy. create campaigns, onboard influencers, select your favourite ones and our technology will help you every step of the way. <br><br>Whether you want to create awareness, generate high quality content or increase conversions without much effort, our technology assists during the whole process.</p>
          <div class="row g-4 g-lg-5 justify-content-center align-items-stretch my-5 position-relative">
            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg" class="zoomIn">
              <path id="blob" d="M361,319.5Q295,389,197.5,374Q100,359,82.5,237Q65,115,190.5,80.5Q316,46,371.5,148Q427,250,361,319.5Z" fill="#e7a7b4"></path>
            </svg>
            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" id="blobSvg" class="zoomIn">
              <path id="blob" d="M361,319.5Q295,389,197.5,374Q100,359,82.5,237Q65,115,190.5,80.5Q316,46,371.5,148Q427,250,361,319.5Z" fill="#e7a7b4"></path>
            </svg>
            <div class="col-12 col-md-6">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-user-plus fa-lg fa-fw"></i>
                </div>
                <div class="title">Free to sign up</div>
                <div class="desc">Free to sign up, yes thats right, no monthly subscription or software fees.</div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-wrench fa-lg fa-fw"></i>
                </div>
                <div class="title">Tools</div>
                <div class="desc">Access to our social media scheduler tool for free where you can auto post and schedule posts a month in advance!</div>
              </div>
            </div>
            <div class="col-12 col-lg-8">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-picture-o fa-lg fa-fw"></i>
                </div>
                <div class="title">Shoutouts</div>
                <div class="desc">If you want to go to market quicker then choose our shoutout campaign, allowing you to send your content to influencers who will post it on their instagram story for fast conversions.</div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-users fa-lg fa-fw"></i>
                </div>
                <div class="title">Groups</div>
                <div class="desc">We make it easy for you to mange your favourite influencers by creating groups like you do on iMessage, whatsapp or messenger.</div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-comments fa-lg fa-fw"></i>
                </div>
                <div class="title">Chat</div>
                <div class="desc">We have implemented a messaging platform on our software to easily connect and chat with influencers.</div>
              </div>
            </div>
            <div class="col-12 col-lg-8">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-cogs fa-lg fa-fw"></i>
                </div>
                <div class="title">Collaborations</div>
                <div class="desc">we provide the easy to use tools, and you.. well you use them, manage your campaigns, accept the influencers submissions you like, view all your accepted, favourites, declined in one place.</div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-users fa-lg fa-fw"></i>
                </div>
                <div class="title">Teams</div>
                <div class="desc">Want to add your team members for help, no problem.</div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="feature-card zoomIn">
                <div class="icon">
                  <i class="fa fa-money fa-lg fa-fw"></i>
                </div>
                <div class="title">Pay</div>
                <div class="desc">Only pay for submissions you approve. No Other fees, we promise!</div>
              </div>
            </div>
          </div>
          <p class="last">Why pay 1000 of pounds to use a platform when you can use that money for your marketing campaigns (riddle me that). When we provide all the tools you need and some more. We are built for businesses of all sizes
          </p>
        </div>
      </section>

      <section class="campaigning">
        <div class="container">
          <div class="text-center">
            <h2 class="heading__underline heading__underline--blue fadeUp">Campaigning...</h2>
          </div>
          <p class="campaigning__lead fadeUp">Use your amazing influencers to exactly target your audience and receive curated content. Use our powerful software to manage all parts of the campaign lifecycle. We have everything you need to launch campaigns, which means no more lazy emails and terrible spreadsheets.</p>

          <h3 class="campaign__heading fadeUp">Two Types of Campaign</h3>

          <div class="campaign__type fadeInFromRight">
            <img src="img/icons/influencer.svg" alt="">
            <div>
              <h4 class="title">Influencer Campaign</h4>
              <p class="desc">Create a campaign and our influencers will apply to work with your brand and within a few days you will receive exclusive content for your brand, and you choose the ones you like and influencers will post it on their social channels to their followers.</p>
            </div>
          </div>
          <div class="campaign__type fadeInFromRight">
            <img src="img/icons/shoutout.svg" alt="">
            <div>
              <h4 class="title">ShoutOut Campaign</h4>
              <p class="desc">If you want to quickly promote your product or service, select the influencer/s and send them content and they will post on their story.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- <section class="other-features">
        <div class="container">
          <div class="text-center">
            <h2 class="heading__underline heading__underline--red fadeUp">Other Features</h2>
          </div>
          <div class="row justify-content-center g-5">
            <div class="col-12 col-md-6 col-lg-5">
              <div class="other-features__card zoomIn">
                <div class="title">Make smart data driven decisions</div>
                <div class="desc">Vet the influencers before you select them for your campaign. Choose influencers that match your audience, location, gender age and much more.</div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
              <div class="other-features__card zoomIn">
                <div class="title">Make smart data driven decisions</div>
                <div class="desc">Vet the influencers before you select them for your campaign. Choose influencers that match your audience, location, gender age and much more.</div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
              <div class="other-features__card zoomIn">
                <div class="title">Make smart data driven decisions</div>
                <div class="desc">Vet the influencers before you select them for your campaign. Choose influencers that match your audience, location, gender age and much more.</div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
              <div class="other-features__card zoomIn">
                <div class="title">Make smart data driven decisions</div>
                <div class="desc">Vet the influencers before you select them for your campaign. Choose influencers that match your audience, location, gender age and much more.</div>
              </div>
            </div>
          </div>
        </div>
      </section> -->

      <section id="contact-brands" class="contact-form contact-form--blue">
        <div class="container">
          
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-xxl-6">
              <form class="insetFromTop" action="" method="POST">
                <div class="text-center">
                  <h2 class="heading__underline heading__underline--blue">Register Today!</h2>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Name*</label>
                  <input type="text" name="name" class="form-control form-control-lg" id="name" required maxlength="50">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" name="email" class="form-control form-control-lg" id="email" required maxlength="50" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Your email is safe with us.</div>
                </div>
                <div class="mb-3">
                  <div class="row g-3 align-items-center">
                    <div class="col-6">
                      <label for="website" class="form-label">Website*</label>
                      <input type="text" name="website" class="form-control form-control-lg" id="website" required maxlength="50">
                    </div>
                    <div class="col-6">
                      <label for="company" class="form-label">Company Name*</label>
                      <input type="text" name="company" class="form-control form-control-lg" id="company" required maxlength="50">
                    </div>
                  </div>
                </div>  
                <div class="mb-3">
                  <label for="number" class="form-label">Number*</label>
                  <div class="row g-3 align-items-center">
                    <div class="col-12 col-md-5">
                      <select name="country" id="country" class="form-select form-select-lg" required>
                        <option value="93">Afghanistan</option>
                        <option value="358">Aland Islands</option>
                        <option value="355">Albania</option>
                        <option value="213">Algeria</option>
                        <option value="1684">American Samoa</option>
                        <option value="376">Andorra</option>
                        <option value="244">Angola</option>
                        <option value="1264">Anguilla</option>
                        <option value="672">Antarctica</option>
                        <option value="1268">Antigua and Barbuda</option>
                        <option value="54">Argentina</option>
                        <option value="374">Armenia</option>
                        <option value="297">Aruba</option>
                        <option value="61">Australia</option>
                        <option value="43">Austria</option>
                        <option value="994">Azerbaijan</option>
                        <option value="1242">Bahamas</option>
                        <option value="973">Bahrain</option>
                        <option value="880">Bangladesh</option>
                        <option value="1246">Barbados</option>
                        <option value="375">Belarus</option>
                        <option value="32">Belgium</option>
                        <option value="501">Belize</option>
                        <option value="229">Benin</option>
                        <option value="1441">Bermuda</option>
                        <option value="975">Bhutan</option>
                        <option value="591">Bolivia</option>
                        <option value="599">Bonaire, Sint Eustatius and Saba</option>
                        <option value="387">Bosnia and Herzegovina</option>
                        <option value="267">Botswana</option>
                        <option value="55">Bouvet Island</option>
                        <option value="55">Brazil</option>
                        <option value="246">British Indian Ocean Territory</option>
                        <option value="673">Brunei Darussalam</option>
                        <option value="359">Bulgaria</option>
                        <option value="226">Burkina Faso</option>
                        <option value="257">Burundi</option>
                        <option value="855">Cambodia</option>
                        <option value="237">Cameroon</option>
                        <option value="1">Canada</option>
                        <option value="238">Cape Verde</option>
                        <option value="1345">Cayman Islands</option>
                        <option value="236">Central African Republic</option>
                        <option value="235">Chad</option>
                        <option value="56">Chile</option>
                        <option value="86">China</option>
                        <option value="61">Christmas Island</option>
                        <option value="672">Cocos (Keeling) Islands</option>
                        <option value="57">Colombia</option>
                        <option value="269">Comoros</option>
                        <option value="242">Congo</option>
                        <option value="242">Congo, Democratic Republic of the Congo</option>
                        <option value="682">Cook Islands</option>
                        <option value="506">Costa Rica</option>
                        <option value="225">Cote D'Ivoire</option>
                        <option value="385">Croatia</option>
                        <option value="53">Cuba</option>
                        <option value="599">Curacao</option>
                        <option value="357">Cyprus</option>
                        <option value="420">Czech Republic</option>
                        <option value="45">Denmark</option>
                        <option value="253">Djibouti</option>
                        <option value="1767">Dominica</option>
                        <option value="1809">Dominican Republic</option>
                        <option value="593">Ecuador</option>
                        <option value="20">Egypt</option>
                        <option value="503">El Salvador</option>
                        <option value="240">Equatorial Guinea</option>
                        <option value="291">Eritrea</option>
                        <option value="372">Estonia</option>
                        <option value="251">Ethiopia</option>
                        <option value="500">Falkland Islands (Malvinas)</option>
                        <option value="298">Faroe Islands</option>
                        <option value="679">Fiji</option>
                        <option value="358">Finland</option>
                        <option value="33">France</option>
                        <option value="594">French Guiana</option>
                        <option value="689">French Polynesia</option>
                        <option value="262">French Southern Territories</option>
                        <option value="241">Gabon</option>
                        <option value="220">Gambia</option>
                        <option value="995">Georgia</option>
                        <option value="49">Germany</option>
                        <option value="233">Ghana</option>
                        <option value="350">Gibraltar</option>
                        <option value="30">Greece</option>
                        <option value="299">Greenland</option>
                        <option value="1473">Grenada</option>
                        <option value="590">Guadeloupe</option>
                        <option value="1671">Guam</option>
                        <option value="502">Guatemala</option>
                        <option value="44">Guernsey</option>
                        <option value="224">Guinea</option>
                        <option value="245">Guinea-Bissau</option>
                        <option value="592">Guyana</option>
                        <option value="509">Haiti</option>
                        <option value="0">Heard Island and Mcdonald Islands</option>
                        <option value="39">Holy See (Vatican City State)</option>
                        <option value="504">Honduras</option>
                        <option value="852">Hong Kong</option>
                        <option value="36">Hungary</option>
                        <option value="354">Iceland</option>
                        <option value="91">India</option>
                        <option value="62">Indonesia</option>
                        <option value="98">Iran, Islamic Republic of</option>
                        <option value="964">Iraq</option>
                        <option value="353">Ireland</option>
                        <option value="44">Isle of Man</option>
                        <option value="972">Israel</option>
                        <option value="39">Italy</option>
                        <option value="1876">Jamaica</option>
                        <option value="81">Japan</option>
                        <option value="44">Jersey</option>
                        <option value="962">Jordan</option>
                        <option value="7">Kazakhstan</option>
                        <option value="254">Kenya</option>
                        <option value="686">Kiribati</option>
                        <option value="850">Korea, Democratic People's Republic of</option>
                        <option value="82">Korea, Republic of</option>
                        <option value="381">Kosovo</option>
                        <option value="965">Kuwait</option>
                        <option value="996">Kyrgyzstan</option>
                        <option value="856">Lao People's Democratic Republic</option>
                        <option value="371">Latvia</option>
                        <option value="961">Lebanon</option>
                        <option value="266">Lesotho</option>
                        <option value="231">Liberia</option>
                        <option value="218">Libyan Arab Jamahiriya</option>
                        <option value="423">Liechtenstein</option>
                        <option value="370">Lithuania</option>
                        <option value="352">Luxembourg</option>
                        <option value="853">Macao</option>
                        <option value="389">Macedonia, the Former Yugoslav Republic of</option>
                        <option value="261">Madagascar</option>
                        <option value="265">Malawi</option>
                        <option value="60">Malaysia</option>
                        <option value="960">Maldives</option>
                        <option value="223">Mali</option>
                        <option value="356">Malta</option>
                        <option value="692">Marshall Islands</option>
                        <option value="596">Martinique</option>
                        <option value="222">Mauritania</option>
                        <option value="230">Mauritius</option>
                        <option value="269">Mayotte</option>
                        <option value="52">Mexico</option>
                        <option value="691">Micronesia, Federated States of</option>
                        <option value="373">Moldova, Republic of</option>
                        <option value="377">Monaco</option>
                        <option value="976">Mongolia</option>
                        <option value="382">Montenegro</option>
                        <option value="1664">Montserrat</option>
                        <option value="212">Morocco</option>
                        <option value="258">Mozambique</option>
                        <option value="95">Myanmar</option>
                        <option value="264">Namibia</option>
                        <option value="674">Nauru</option>
                        <option value="977">Nepal</option>
                        <option value="31">Netherlands</option>
                        <option value="599">Netherlands Antilles</option>
                        <option value="687">New Caledonia</option>
                        <option value="64">New Zealand</option>
                        <option value="505">Nicaragua</option>
                        <option value="227">Niger</option>
                        <option value="234">Nigeria</option>
                        <option value="683">Niue</option>
                        <option value="672">Norfolk Island</option>
                        <option value="1670">Northern Mariana Islands</option>
                        <option value="47">Norway</option>
                        <option value="968">Oman</option>
                        <option value="92">Pakistan</option>
                        <option value="680">Palau</option>
                        <option value="970">Palestinian Territory, Occupied</option>
                        <option value="507">Panama</option>
                        <option value="675">Papua New Guinea</option>
                        <option value="595">Paraguay</option>
                        <option value="51">Peru</option>
                        <option value="63">Philippines</option>
                        <option value="64">Pitcairn</option>
                        <option value="48">Poland</option>
                        <option value="351">Portugal</option>
                        <option value="1787">Puerto Rico</option>
                        <option value="974">Qatar</option>
                        <option value="262">Reunion</option>
                        <option value="40">Romania</option>
                        <option value="70">Russian Federation</option>
                        <option value="250">Rwanda</option>
                        <option value="590">Saint Barthelemy</option>
                        <option value="290">Saint Helena</option>
                        <option value="1869">Saint Kitts and Nevis</option>
                        <option value="1758">Saint Lucia</option>
                        <option value="590">Saint Martin</option>
                        <option value="508">Saint Pierre and Miquelon</option>
                        <option value="1784">Saint Vincent and the Grenadines</option>
                        <option value="684">Samoa</option>
                        <option value="378">San Marino</option>
                        <option value="239">Sao Tome and Principe</option>
                        <option value="966">Saudi Arabia</option>
                        <option value="221">Senegal</option>
                        <option value="381">Serbia</option>
                        <option value="381">Serbia and Montenegro</option>
                        <option value="248">Seychelles</option>
                        <option value="232">Sierra Leone</option>
                        <option value="65">Singapore</option>
                        <option value="1">Sint Maarten</option>
                        <option value="421">Slovakia</option>
                        <option value="386">Slovenia</option>
                        <option value="677">Solomon Islands</option>
                        <option value="252">Somalia</option>
                        <option value="27">South Africa</option>
                        <option value="500">South Georgia and the South Sandwich Islands</option>
                        <option value="211">South Sudan</option>
                        <option value="34">Spain</option>
                        <option value="94">Sri Lanka</option>
                        <option value="249">Sudan</option>
                        <option value="597">Suriname</option>
                        <option value="47">Svalbard and Jan Mayen</option>
                        <option value="268">Swaziland</option>
                        <option value="46">Sweden</option>
                        <option value="41">Switzerland</option>
                        <option value="963">Syrian Arab Republic</option>
                        <option value="886">Taiwan, Province of China</option>
                        <option value="992">Tajikistan</option>
                        <option value="255">Tanzania, United Republic of</option>
                        <option value="66">Thailand</option>
                        <option value="670">Timor-Leste</option>
                        <option value="228">Togo</option>
                        <option value="690">Tokelau</option>
                        <option value="676">Tonga</option>
                        <option value="1868">Trinidad and Tobago</option>
                        <option value="216">Tunisia</option>
                        <option value="90">Turkey</option>
                        <option value="7370">Turkmenistan</option>
                        <option value="1649">Turks and Caicos Islands</option>
                        <option value="688">Tuvalu</option>
                        <option value="256">Uganda</option>
                        <option value="380">Ukraine</option>
                        <option value="971">United Arab Emirates</option>
                        <option value="44" selected>United Kingdom</option>
                        <option value="1">United States</option>
                        <option value="1">United States Minor Outlying Islands</option>
                        <option value="598">Uruguay</option>
                        <option value="998">Uzbekistan</option>
                        <option value="678">Vanuatu</option>
                        <option value="58">Venezuela</option>
                        <option value="84">Viet Nam</option>
                        <option value="1284">Virgin Islands, British</option>
                        <option value="1340">Virgin Islands, U.s.</option>
                        <option value="681">Wallis and Futuna</option>
                        <option value="212">Western Sahara</option>
                        <option value="967">Yemen</option>
                        <option value="260">Zambia</option>
                        <option value="263">Zimbabwe</option>
                      </select>
                    </div>
                    <div class="col-12 col-md-7">
                      <input type="tel" name="number" class="form-control form-control-lg" id="number" pattern="[+, 0-9]+" required aria-describedby="numberHelp">
                    </div>
                  </div>
                  <div id="numberHelp" class="form-text">Your number is safe with us.</div>
                </div>
                <div class="mb-3">
                  <div class="row g-3 align-items-center">
                    <div class="col-6">
                      <label for="budget" class="form-label">Estimated Budget (in Pounds)*</label>
                      <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">£</span>
                        <input type="number" name="budget" class="form-control" id="budget" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="hear" class="form-label">How did you hear about us?*</label>
                      <select name="hear" id="hear" class="form-select form-select-lg" required>
                        <option disabled selected value></option>
                        <option value="linkedin">Linkedin</option>
                        <option value="google">Google</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="friend/family">Friend/Family</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                  </div>
                </div>          
                <button type="submit" name="submit" class="btn btn-primary py-2 px-4 rounded-pill mt-4">Submit</button>
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

        const sceneImg = document.querySelectorAll('.scene__img');
        const sceneSymbol = document.querySelectorAll('.scene__symbol');
        let tl3Cards = gsap.timeline()
        .from("#blobSvg", {scale: 0})
        .from(sceneImg, {opacity: 0, stagger: 0.1})
        .from(sceneSymbol, {opacity: 0})
        .from(".brands-hero h1", {x: -100, opacity: 0}, 0.75)
        .from(".brands-hero h2", {x: -100, opacity: 0}, 1)
        .from(".brands-hero a", {x: -100, opacity: 0}, 1.25)
        .from(".brands-hero .arrows", {scale: 0, stagger: 0.1}, 1.25)
        .eventCallback("onComplete", completeHandler)


        function completeHandler() {
          document.querySelector(".scene").classList.add("play");
        }

        const accordionhLinks = document.querySelectorAll('.accordion-h__link');
        const accordionhItems = document.querySelectorAll('.accordion-h__item');

        for(let i = 0; i < accordionhLinks.length; i++) {
          accordionhLinks[i].addEventListener('click', (e) => {
            e.preventDefault();
            console.log('check');
            removeActive();
            accordionhLinks[i].classList.add("active");
            accordionhItems[i].classList.add("active");
            gsap.from(accordionhItems[i], {opacity: 0});
          })
        }
        function removeActive() {
          for(let i = 0; i < accordionhLinks.length; i++) {
            accordionhLinks[i].classList.remove("active");
            accordionhItems[i].classList.remove("active");
          }
        }
      }
    </script>
  </body>
  <?php include 'includes/credit.php'; ?>
</html>