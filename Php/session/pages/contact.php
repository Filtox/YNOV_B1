<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>contact</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
 <br>   
<!--Section: Contact v.2-->
<section class="mb-4"> 
    
    <!--Grid column-->
    <div class="col-md-9 mb-md-0 mb-5">
      <form id="contact-form" name="contact-form" action="mail.php" method="POST">
        
        <!--Grid row-->
        <div class="row"> 
          
          <!--Grid column-->
          <div class="col-md-6">
            <div class="md-form mb-0">
              <input type="text" id="name" name="name" class="form-control">
              <label for="name" class="">Nom</label>
            </div>
          </div>
          <!--Grid column--> 
          
          <!--Grid column-->
          <div class="col-md-6">
            <div class="md-form mb-0">
              <input type="text" id="email" name="email" class="form-control">
              <label for="email" class="">E-mail</label>
            </div>
          </div>
          <!--Grid column--> 
          
        </div>
        <!--Grid row--> 
        
        <!--Grid row-->
        <div class="row">
          <div class="col-md-12">
            <div class="md-form mb-0">
              <input type="text" id="subject" name="subject" class="form-control">
              <label for="subject" class="">Objet</label>
            </div>
          </div>
        </div>
        <!--Grid row--> 
        
        <!--Grid row-->
        <div class="row"> 
          
          <!--Grid column-->
          <div class="col-md-12">
            <div class="md-form">
              <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
              <label for="message">Votre message</label>
            </div>
          </div>
        </div>
        <!--Grid row-->
        
      </form>
      <div class="text-center text-md-left"> <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a> </div>
      <div class="status"></div>
    </div>
    <!--Grid column--> 
  </div>
</section>
<!--Section: Contact v.2-->
</body>
</html>
