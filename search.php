
<?php include 'includes/header.php'; ?>

         <div id="serachdiv">
         </div>

                        <?php

                        $output = '';

                        if(isset($_POST['query'])){
                            $search = $_POST['query'];
                            $stmt = $db->prepare("SELECT * FROM products WHERE product_title LIKE concat('%',?,'%')");
                            $stmt ->bind_param("s",$search);
                           // $stmt->execute();
                            //$row = $stmt->fetch();
                        }
                        else {
                            $stmt = $db->prepare("select * from products");
                        }
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result->num_rows> 0){
                            $output ="
                            
                            ";
                            while ($row=$result->fetch_assoc()){

                                $row['product_title'];
                                echo "success";

                            }

                        }


//                        if($row['numrows'] < 1){
//                            echo '<h1 class="page-header">No results found for <i>'.$_POST['keyword'].'</i></h1>';
//                        }
//                        else{
//                            echo '<h1 class="page-header">Search results for <i>'.$_POST['keyword'].'</i></h1>';
//                            try{
//                                $inc = 3;
//                                $stmt = $db->prepare("SELECT * FROM products WHERE name LIKE :keyword");
//                                $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
//
//                                foreach ($stmt as $row) {
//                                    $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
//                                    $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
//                                    $inc = ($inc == 3) ? 1 : $inc + 1;
//                                    if($inc == 1) echo "<div class='row'>";
//                                    echo "
//	       							<div class='col-sm-4'>
//	       								<div class='box box-solid'>
//		       								<div class='box-body prod-body'>
//		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
//		       									<h5><a href='product.php?product=".$row['slug']."'>".$highlighted."</a></h5>
//		       								</div>
//		       								<div class='box-footer'>
//		       									<b>&#36; ".number_format($row['price'], 2)."</b>
//		       								</div>
//	       								</div>
//	       							</div>
//	       						";
//                                    if($inc == 3) echo "</div>";
//                                }
//                                if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
//                                if($inc == 2) echo "<div class='col-sm-4'></div></div>";
//
//                            }
//                            catch(PDOException $e){
//                                echo "There is some problem in connection: " . $e->getMessage();
//                            }
//                        }

                                                ?>


    <?php include 'includes/footer.php'; ?>

