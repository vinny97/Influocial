<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'includes/links.php'; ?>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <title>About Us | Influocial</title>
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <main>
    <section class="about">
      <div class="container">
        <h1 class="heading__1 heading__1--blue heading__1--center display-5">The Influocial Story</h1>
        <div class="row g-5 justify-content-center align-items-center">
          <div class="col-8 col-lg-4">
            <img src="img/home/influocial-story.png" alt="">
          </div>
          <div class="col-12 col-lg-8 position-relative">
            <p>Influocial was created in 2021 to for brands to exploit influencers for their marketing strategies. Influocial allows businesses to connect with creators and influencers right away.</p>
            <p class="mb-5">We realised that celebrity endorsements and collaborations are far too expensive and don't return enough impressions and reach. Why not use Micro Influencers who are cheaper and a have higher engagement rate than celebs.</p>
    
            <p>As influencer marketing is growing year on year we wanted to tap in and provide a service that helps businesses for their marketing needs and they don't have to spend a lot on software or subscription fees.</p>
            <p>Our mission is to bring new ideas, new challenges and new content to marketing.</p>
            <img src="img/graphics/blue-blur.png" alt="" class="blue-blur">
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include 'includes/footer.php'; ?>
  <script>
    window.onload = function() {
      document.querySelector('.loading').style.display = 'none';
      observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.intersectionRatio > 0) {
            entry.target.classList.add('animate');
          } else {
            entry.target.classList.remove('animate');
          }
        });
      });
      const anims = document.querySelectorAll('.anim');
      anims.forEach(anim => {
        observer.observe(anim);
      });
    }
    </script>
  <?php include 'includes/credit.php'; ?>
</body>
</html>