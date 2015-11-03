<?php
	include ('cek-akses.php');
?>
        
		<div class="container_12">
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Tambah Admin</span></h2>
                        
                     <div class="module-body">
                        <form name="tambah" method="post" action="">
                            
                            <p>
                                <label>ID Admin</label>
                                <textarea name="idadmin" rows="7" cols="90" class="input-short"></textarea>
                            </p>
							
							<p>
                                <label>Nama</label>
                                <textarea name="nama" rows="7" cols="90" class="input-medium"></textarea>
                            </p>
							
							<p>
                                <label>Hak Akses</label>
                                <select class="input-medium" name="akses">
                                    <option value=0>Super Admin</option>
                                    <option value=1>Admin</option>
                                </select>
                            </p>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" name="tambah" value="Submit" /> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->

            
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->