<?php
/*
Plugin Name: Xtreme Media Wall
Plugin URI: 
Description: The most advanced Media Wall application. No Flash Knowledge required to insert the Media Wall SWF inside the HTML page(s) of your site.
Version: 1.0
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_wall_swf_nr	= 0; 											

function xtremeWallStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-media-wall\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeWallAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeWallAddObj($xtreme_wall_param) {

    global $xtreme_wall_swf_nr; //number of swfs
	$xtreme_wall_swf_nr++;
	
	$xtreme_wall_rand = substr(rand(),0,3);
	
	$xtreme_wall_dir = WP_CONTENT_URL .'/flashtuning/xtreme-media-wall/';
	$xtreme_wall_swf = $xtreme_wall_dir.'PhotoWallGallery.swf';
	$xtreme_wall_config = "swfobj2";
	
	if ($xtreme_wall_param[2] !=""){$xtreme_wall_width = $xtreme_wall_param[2];}
	else {$xtreme_wall_width = 960;}
	
	if ($xtreme_wall_param[4] !=""){$xtreme_wall_height = $xtreme_wall_param[4];}
	else {$xtreme_wall_height = 430;}
	
	if ($xtreme_wall_param[6] !=""){$xtreme_wall_xml  = $xtreme_wall_dir.'assets/xml/'.$xtreme_wall_param[6];}
	else {$xtreme_wall_xml = $xtreme_wall_dir.'assets/xml/wall-settings.xml';}
	
	
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_wall_param = array("quality" =>	"high", "bgcolor" => "", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_wall_config = "xhtml";}

	
	if ($xtreme_wall_config != "xhtml") {
		$xtreme_wall_output = "<div id=\"xtreme-media-wall".$xtreme_wall_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_wall_config) {
	
		case "xhtml":
			$xtreme_wall_output.= "\n<object width=\"".$xtreme_wall_width."\" height=\"".$xtreme_wall_height."\">\n";
			$xtreme_wall_output.= "<param name=\"movie\" value=\"".$xtreme_wall_swf."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"quality\" value=\"".$xtreme_wall_param['quality']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"bgcolor\" value=\"".$xtreme_wall_param['bgcolor']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"wmode\" value=\"".$xtreme_wall_param['wmode']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_wall_param['allowfullscreen']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"scale\" value=\"".$xtreme_wall_param['scale']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"salign\" value=\"".$xtreme_wall_param['salign']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_wall_param['allowscriptaccess']."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"base\" value=\"".$xtreme_wall_dir."\"></param>\n";
			$xtreme_wall_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_wall_xml."\"></param>\n";
			
			
			$xtreme_wall_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_wall_width."\" height=\"".$xtreme_wall_height."\" src=\"".$xtreme_wall_swf."\" ";
			$xtreme_wall_output.= "quality=\"".$xtreme_wall_param['quality']."\" bgcolor=\"".$xtreme_wall_param['bgcolor']."\" wmode=\"".$xtreme_wall_param['wmode']."\" scale=\"".$xtreme_wall_param['scale']."\" salign=\"".$xtreme_wall_param['salign']."\" allowScriptAccess=\"".$xtreme_wall_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_wall_param['allowfullscreen']."\" base=\"".$xtreme_wall_dir."\" FlashVars=\"setupXML=".$xtreme_wall_xml."\"  ";
			
			$xtreme_wall_output.= "></embed>\n";
			$xtreme_wall_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_wall_output.= '<script type="text/javascript">';
			$xtreme_wall_output.= "swfobject.embedSWF('{$xtreme_wall_swf}', 'xtreme-media-wall{$xtreme_wall_rand}', '{$xtreme_wall_width}', '{$xtreme_wall_height}', '{$xtreme_wall_param['version']}', '' , { setupXML: '{$xtreme_wall_xml}'}, {base: '{$xtreme_wall_dir}', wmode: '{$xtreme_wall_param['wmode']}', scale: '{$xtreme_wall_param['scale']}', salign: '{$xtreme_wall_param['salign']}', bgcolor: '{$xtreme_wall_param['bgcolor']}', allowScriptAccess: '{$xtreme_wall_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_wall_param['allowfullscreen']}'}, {});";
			$xtreme_wall_output.= '</script>';
	
			break;
					
	}
	return $xtreme_wall_output;
}

function xtremeMediaWallEcho($xtreme_wall_width, $xtreme_wall_height, $xtreme_wall_output) {
    echo xtremeWallAddObj( array( null, null, $xtreme_wall_width, null, $xtreme_wall_height, null, $xtreme_wall_output) );
}




function xtremeWallAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme Media Wall 1.0</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the flashtuning folder(located in Wordpress folder) in the wp-content folder on your server. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-media-wall/)
						</th>

					</tr>
                   <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-media-wall]</strong>.</li>
                            <li>2. If you want to modify the width and height of the media wall insert this attributes into the tag: <strong>[xtreme-media-wall width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme Media Wall on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-media-wall/assets/xml</strong> folder: wall-settings.xml, used for general settings, and media.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: wall-settings2.xml, media2.xml) </li>
                                <li>c. Open the media-settings2.xml, search for this tag <strong> <imageUrl>
    <url value="assets/xml/media.xml"/> </imageUrl></strong> and change the attribute value to <em>media2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-media-wall/assets/xml</strong> folder</li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-media-wall xml="media-settings2.xml"] when you insert the media wall on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeMediaWallEcho(width,height,xmlFile)</strong> (e.g: xtremeMediaWallEcho(960,430,'media-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-media-wall.html">Xtreme Media Wall Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeWallAdminAdd() {
	
	add_options_page('Xtreme Media Wall Options', 'Xtreme Media Wall', 'manage_options','xtrememediawall', 'xtremeWallAdmin');
}

function xtremeWallSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeWallStart');
add_action('admin_menu', 'xtremeWallAdminAdd');
add_action('init', 'xtremeWallSwfObj');
?>