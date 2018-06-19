<br><br><br><br><br>
<div class="footer">
  
    IntegralFoods © 2018 - <a href="https://www.integralfoods.fr/mentions-legales/">Mentions Légales   </a>	

    <a class="fab fa-facebook-f" href="https://www.facebook.com/Integral-Foods-340121856455149/"></a>

		<a class="fab fa-linkedin-in" href="https://www.linkedin.com/company/integral-foods/"></a>

		<a class="fab fa-instagram" href="https://www.instagram.com/integralfoods/"></a>

		<a class="fab fa-twitter" href="https://twitter.com/IntegralFoods"></a>
     				
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
@empty($lignes)
@else
    <script src="/js/panier.js"></script>
@endempty

@empty($articleclients)
@else
    <script src="/js/ajouterpanier.js"></script>
@endempty
  </body>
</html>
