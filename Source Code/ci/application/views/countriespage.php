<div id="containerHolder">
			<div id="container" style="background:#FFF;">
        		
                
                  <?php 				  
				  $page_num = (int)$this->uri->segment(2);
				  if($page_num==0) $page_num=1;
				  $order_seg = $this->uri->segment(4,"asc"); 
				  if($order_seg == "asc") $order = "desc"; else $order = "asc";
				  ?>                             
                <!-- // #main -->
                <div id="main" style="padding-top:5px; float:left; margin-left:15px;"> 
                
                
                              	
                    <div style="float:left;"><h3>Countries</h3></div><br />
                    
                    <span class="largefont"></span>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemID/<?=$order?>">ID</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">CountryCode</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">Country</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">Currency</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">Population</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">Capital</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemName/<?=$order?>">Continent</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/categoryID/<?=$order?>">ContinentCode</a></b></td>
                                <td><b><a href="<?php echo base_url();?>pagination/<?=$page_num?>/itemPrice/<?=$order?>">AreaInSqKm</a></b></td>
                            </tr>
                            <?php 
							$i = 0;					
							
							if(count($countriesdata) > 0) {							
								foreach($countriesdata as $val) { ?>
								   <tr class="odd">
										<td style="text-align:left;"><?=$val["idCountry"];?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['countryCode']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['countryName']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['currencyCode']?></td>
										
										<td style="text-align:left; vertical-align:middle;"><?=$val['population']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['capital']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['continentName']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['continent']?></td>
										<td style="text-align:left; vertical-align:middle;"><?=$val['areaInSqKm']?></td>
									</tr>
								<?php } ?>
                            <?php
							}
							else {
							?>
							<tr class="odd"><td colspan="9">No records with this search</td></tr>
							<?php
							}
							?>
                                         
                        </table><br /><br /> 
                        <center><?php echo $page_links; ?></center>
                         <br /><br />  
                         
                         <!--------------------------------------------------------------------------->
                 <hr />
                 
                 <form name="frm_search" id="frm_search" method="post" action="<?php echo base_url();?>pagination">
                   <fieldset style="width:44em;">
                   		<legend>SEARCH</legend>
                            <fieldset>
                                <label for="countryCode" class="first">
                                    Country Code
                                    <input id="countryCode" name="countryCode" type="text" placeholder="Country Code" value="<?=$this->session->userdata("countryCode");?>" />
                                </label>
                                <label for="countryName">
                                    Country
                                    <input id="countryName" name="countryName" type="text" placeholder="Country Name" value="<?=$this->session->userdata("countryName");?>" />
                                </label>
                                <label for="currencyCode">
                                    Currency Code
                                    <input id="currencyCode" name="currencyCode" type="text" placeholder="Currency Code" value="<?=$this->session->userdata("currencyCode");?>"/>
                                </label>
                                
                                <label for="population">
                                    Population
                                    <select id="population" name="population">
                                        <option value="">[SELECT]</option>
                                        <option value="asc" <?php if($this->session->userdata("population")=='population asc') echo 'selected'; ?>>Low to High</option>
                                        <option value="desc" <?php if($this->session->userdata("population")=='population desc') echo 'selected'; ?>>High to  Low</option>
                                    </select>
                                </label>
                            </fieldset>
                            
                            
                            <fieldset style="height:174px; margin-left:5px;">
                                <label for="capital" class="first">
                                    Capital Name
                                    <input id="capital" name="capital" type="text" placeholder="Capital Name" value="<?=$this->session->userdata("capital");?>"/>
                                </label>
                                <label for="continentName">
                                    Continent Name
                                    <input id="continentName" name="continentName" type="text" placeholder="Continent Name" value="<?=$this->session->userdata("continentName");?>"/>
                                </label>
                                <label for="continent">
                                    Continent Code
                                    <input id="continent" name="continent" type="text" placeholder="Continent Code" value="<?=$this->session->userdata("continent");?>"/>
                                </label>
                                
                                <label for="areaInSqKm">
                                    Area In SqKm
                                    <select id="areaInSqKm" name="areaInSqKm">
                                        <option value="">[SELECT]</option>
                                        <option value="asc" <?php if($this->session->userdata("areaInSqKm")=='areaInSqKm asc') echo 'selected'; ?>>Low to High</option>
                                        <option value="desc" <?php if($this->session->userdata("areaInSqKm")=='areaInSqKm desc') echo 'selected'; ?>>High to  Low</option>
                                    </select>
                                </label>
                            </fieldset>  
                            <p></p>
                            <input type="submit" name="search" class="button large blue" value="SEARCH" style="height:50px;"  />
                            <input type="submit" name="reset" class="button large blue" value="RESET" style="height:50px;margin-top:15px;"  />
                    </fieldset>                        
                </form>
                 <div style="clear:both;"></div>
               
               <br /><br /><br />
                <!---------------------------------------------------------------------------> 
                                  
                </div>
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>