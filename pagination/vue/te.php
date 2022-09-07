<?php $titre ="pagination" ?>


    <?php
require_once('head.php');
?>


<section>



     <!-- Select dropdown -->
    <div class="d-flex justify-content-center">
            <form action="../controleur/AllVilleController.php" method="post">
                <select name="records-limit" id="records-limit" class="form-select form-select-lg mb-5">
                    <option disabled selected>Records Limit</option>
                    <?php foreach([2,5,7,10,12,$allRecrods] as $limit) : ?>
                    <option
                        <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                        value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </form>
    </div>

    <div class="wrapperr row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



   

	<?php
	
		while($resultat = $requete->fetch())
		{
		
	?>
    
        <div class="carousel ">
            <a href="DetailSiteController.php?num_ville=<?php echo $resultat['id_ville']; ?>">
                <div class="carde carde-3">
                    <div  class="image2_div">
                        <img class="image2 " src="<?php echo $resultat['img_ville']; ?>" alt="<?php echo $resultat['nom_ville']; ?>" >
                    </div>

                    <div  class="titre">
                        <h3 class='h3'><?php echo $resultat['nom_ville']; ?></h3>
                    </div>
            
                </div>
            </a>
        </div>
   
        <?php
		
		}
	
	?>
        
    </div>
    <div class="container mb-5">
        <nav aria-label="Page navigation example mt-5">
            <!-- Pagination -->
            <div class="pagination justify-content-center">
                <form action="<?php if($prev < 1){ echo '#'; }?>" method="post" class="">
                    <input type="hidden" name="prev_hidden" class="form-control" value="<?= $prev ?>">

                    <input type="submit" name="prev" class="btn btn-warning"
                    <?php 
                        if($prev < 1)
                        { 
                            echo 'disabled'; 
                        }
                        
                        
                        ?>
                    value="Previous">

                </form>
           
                <form action="../controleur/testcont.php" method="post" class="form-group d-flex m-auto ">
                    
                    <input type="number" name="page" min="1" max="<?= $totoalPages ?>" class="form-control  text-center" value="<?= $page ?>">

                    <input type="submit" name="choix_page" class="form-control ml-4 w-50 btn btn-success" value="OK">



                </form>

                <form action="<?php if($next > $totoalPages){ echo '#'; }?>" method="post" class="">
                    <input type="hidden" name="next_hidden" class="form-control" value="<?= $next ?>">

                    <input type="submit" name="next" class="btn btn-warning"
                    <?php 
                        if($next > $totoalPages)
                        { 
                            echo 'disabled'; 
                        }
                        
                        
                        ?>
                    value="Next">

                </form>
            </div>
        </nav>
           


    </div>


    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
    </script>
        

       
</section>


</body>