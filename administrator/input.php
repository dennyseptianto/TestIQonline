<?php
	try{
	$sql = "SELECT * FROM test_kategori";
	$res = $db->query($sql); } 
	catch (PDOException $e) { echo $e->getMessage(); 
	}
?>

		<div class="container_12">
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Input Soal</span></h2>
                     <div class="module-body">
					 <p id="slide">
						<a href="javascript:$.pageslide({ direction: 'left', href: 'soal_gambar.html' })">Soal Berupa Gambar?</a>
					 </p>
					 <div id="flip">Upload Gambar</div>
					 <div id="panel">
						<form action="" method="post"
							enctype="multipart/form-data">
							<input type="file" name="file" id="file">
							<input type="submit" name="uplod" value="Submit">
						</form>
					</div>
                        <form name="input" method="post" action="">
                            <p>
								<br />
                                <label>Kategori Soal</label>
                                <select class="input-short" name="kategori">
								<?php
									foreach($res as $data){
										echo '<option value="' .$data['kd_kategori']. '">'.$data['nm_kategori']. '</option>';
								}?>
                                </select>
                            </p>
                            
                            <fieldset>
						
                                <label>Soal</label> 
								<textarea class="markItUp" name="soal" cols="80" rows="20" required></textarea>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban A</label>
								<textarea class="markItUp" name="pil_a" cols="80" rows="20" required></textarea>
                                </script> 
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban B</label>
								<textarea class="markItUp" name="pil_b" cols="80" rows="20" required></textarea>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban C</label>
								<textarea class="markItUp" name="pil_c" cols="80" rows="20" required></textarea>
                                </script>
                            </fieldset>
							
							<fieldset>
                                <label>Jawaban D</label>
								<textarea class="markItUp" name="pil_d" cols="80" rows="20" required></textarea>
                                </script>
                            </fieldset>
							
							<p>
                                <label>Kunci</label>
                                <select class="input-short" name="kunci">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </p>
							
							<p>
								<label>Skor Soal</label>
                                <select class="input-short" name="skor">
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                </select>
							</p>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" name="input" value="Submit" /> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->

            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2010. <a href="http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
    <script src="jquery.pageslide.min.js"></script>
	</body>
</html>