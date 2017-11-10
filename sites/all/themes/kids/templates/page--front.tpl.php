<?php

/**
 * @file
 * kids's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.

 */
?>
 
<script>
 //(
 //function($) {
  jQuery(document).ready(function(){
<?php for($x=1;$x<=4;$x++)
{
 
 echo "       jQuery('#block-views-slider-block .views-row-1').css('display','block');	    
	       jQuery('#block-views-slider-title-block .views-row-$x span').hover(function(){
	          
	       jQuery('#block-views-slider-block .views-row').css('display','none');	       
	        jQuery('#block-views-slider-block .views-row-$x').css('display','block');
		
	        });
		 jQuery('#block-views-slider-title-block .views-row-$x span a').hover(function(){
	          
	       jQuery('#block-views-slider-block .views-row').css('display','none');	       
	        jQuery('#block-views-slider-block .views-row-$x').css('display','block');
		
	        });
		jQuery('#block-views-slider-title-block .views-row-$x span').mouseout(function(){
	          
	       jQuery('#block-views-slider-block .views-row').css('display','none');	       
	        jQuery('#block-views-slider-block .views-row-1').css('display','block');
		
	        }); ";
  
}?>
}); 
//}(jQuery)
//);
 </script>

<?php  if($_POST['homepage']) {  ?>

<div id="wrapper">
       <div id="body">
	   <div id="header">
	      <div class="moduletable header_image">
		    <div class="image">
		         <?php print render($page['header']); ?>
		    </div>
                    <div class="description">
                       <div>&nbsp;</div>
                   </div>
	       </div>
	    
	
          <div class="moduletable lang">
	    <div id="jflanguageselection">
          <?php $getfr= $_REQUEST['q'];
					 $showfr = explode('/',$getfr);
			     
					 
					if($showfr[0]=='node')			
					{
					$showfr = 'fr/'.$getfr ;
					}
					else if($showfr[0]=='fr')			
					{
					$showfr = $getfr ;
					}
					
					$showfrn = explode('/',$getfr);
					
					if($showfrn[0]=='node')			
					{
					$shownewfrn = $getfr ;
					}
					else if ($showfrn[0]=='fr')	
					{
					$shownewfrn = $showfrn[1].'/'.$showfrn[2];
					}
					
					;?>

		    <ul class="jflanguageselection">
			      <!--li id="active_language"><a href="http://packnation.com.au/not-to-kids/" ><span lang="en">English</span></a></li>
			      <li><a href="http://packnation.com.au/not-to-kids/?q=fr/node/1" ><span lang="fr">Francais</span></a></li>-->
			      <li><form method="post" action="<?php echo base_path(); ?> ">
  
  <input type="hidden" value="homepage" name="homepage">
  
  <input type="submit" value="english" class="home_english_landing">
  
  </form></li>
			
			<li><form method="post" action="<?php echo base_path().'fr' ; ?>">
  
  <input type="hidden" value="homepage" name="homepage">
  
  <input type="submit" value="Francais" class="home_fr_landing">
  
  </form></li>
		    </ul>
      </div>
	   
		</div>
	
  
		    <div class="moduletable logo">
		    
		    
                       <?php if ($logo): ?>
                       
                       	
		<form method="post">
  
  <input type="hidden" value="homepage" name="homepage">
  
	
        <input type="submit" value="logo" class="logo_pg">
  </form>
    <?php endif; ?>
		    
		    </div>
               </div>

	      <div class="inner">
		<div id="menu">
		    <div class="inner">
			<div class="moduletable_menu">
			   <?php print render($page['header-bottom']); ?> 
			    
			</div>
	          <div class="clear"></div>
	    </div></div>
                <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>
    
         <div class="inner-left">
            <div id="content">
               <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
            </div></div>



						<div id="sidebar">
        <div id="resize"> <span style="font-size: 14px; cursor: pointer; padding-right: 10px;" onclick="resize(true)">A<sup>+</sup></span> <span style="font-size: 12px; cursor: pointer;" onclick="resize(false)">A<sup>-</sup></span> </div>
        <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar">


  <?php $showfr = explode('/',$front_page);
					if($showfr[1]=='fr'){ ?>
             <div class="section"> <?php print render($page['sidebar_first_fr']); ?> </div>
<?php	} else { ?>
          <div class="section"> <?php print render($page['sidebar_first']); ?> </div>
 <?php } ?>
        </div>
        <?php endif; ?>
				</div>







    <div style="clear: both; height:22px; width: 100%"></div>
							</div>
		</div>

		<div id="footer_spacer"></div> 

  <?php $showfr = explode('/',$front_page);
			     
				
					if($showfr[1]=='fr')
					{ ?>
					             
		                              <?php print render($page['footer-french']); ?>
				<?php	}
					else 
					{ ?>


		<div id="footer"><div class="inner"><div>
					<div class="moduletable menu">
                                           <?php print render($page['footer']); ?>
					
                                        </div>
			<div class="moduletable copyright">
					<div>&copy; Not to Kids 2011</div>		</div>
			<div class="moduletable site_by">
					Site By <a href="http://www.ccistudios.com" target="_blank">CCI Studios</a>		</div>
			<div class="moduletable">
					<div class="center">Not to Kids is a Coalition of Ontario Public Health Units</div>		</div>
	
			<div class="clear"></div>
		</div></div></div> 	
         	<?php } ?>
      
</div>

	<div class="hidden">
		<ul class="menu"><li id="current" class="active item1"><a href="http://www.nottokids.ca/"><span>Home</span></a></li><li class="item36"><a href="/actions-and-links/"><span>Actions and Links</span></a></li><li class="item40"><a href="/illegal-cigarettes-lure-high-schoolers.html"><span>Illegal Cigarettes Lure High School Students</span></a></li></ul>
	</div>

 <?php  }else { 


    ?>
    
    
    <!--===============================================landing page=============================================-->
<div id="wrapper_landing">
   <div id="body">   
	   <div id="content">
	   <div>
		<p class="center">Get Hooked on life not for life<br>
			Accroches &agrave; la vie pas pour la vie</p>


  

  
		<div id="logo">  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></div>


		<ul class="landingform"> 
		<li><form method="post">
  
  <input type="hidden" value="homepage" name="homepage">
  
  <input type="submit" value="english" class="english_landing">
  
  </form></li>
			
			<li><form method="post" action="/fr/">
  
  <input type="hidden" value="homepage" name="homepage">
  
  <input type="submit" value="french" class="fr_landing">
  
  </form></li>
		</ul>
	</div>
	   </div>
   </div>   
  <div id="footer">
		<div class="left">&copy; Not to Kids 2014</div>
		<div class="right">&copy; Pas aux Jeunes 2014</div>
	</div>
</div>

<!--=============================================end landing page===========================================-->

<?php  } ?>
