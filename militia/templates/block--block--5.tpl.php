<?php
/*
 *	Teamspeak 3 Server Viewer.
 */
 $theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
?>
<div id="block-ts3_viewer">
	<?php
  /**
   * TS3 Web Viewer Class - PHP 5.2.2 or higher is required!
   * only use with beta23 or higher!
   *
   * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
   * @link       http://www.z-index.net
   * @copyright  2010 - 2011 Branko Wilhelm
   * @license    GNU General Public License v2 <http://www.gnu.org/licenses/gpl-2.0.html>
   * @package    ts3-viewer-class
   * @version    $Id: example.php 45 2012-10-10 10:35:44Z branko.wilhelm@gmail.com $
   */
  $cfg['ts3_host'] = '127.0.0.1';
//  $cfg['ts3_host'] = '198.96.94.106';
  $cfg['ts3_query'] = 10011;
  //$cfg['ts3_sid']   = 1;
  $cfg['ts3_port'] = 9987;
  
  /*
   * NOTE: Access without Serverlogin is only possible if the following rights of the Servergroup "Guest" set
   *
   * b_virtualserver_select
   * b_virtualserver_info_view
   * b_virtualserver_channel_list
   * b_virtualserver_client_list
   */
  
  error_reporting(-1);  // ini_set('display_errors', 1); // only for this example!
  
  require($theme_path.'/scripts/ts3-viewer-class/class.ts3viewer.php');
  
  $ts3 = new TS3Viewer($cfg['ts3_host'], $cfg['ts3_query'], null, $cfg['ts3_port']);      // select Server by UDP Port
  // $ts3 = new TS3Viewer($cfg['ts3_host'], $cfg['ts3_query'], $cfg['ts3_sid']);          // select Server by ServerID
  $ts3->serverlogin = array('login' => 'serverquery', 'password' => 'KTkKOmXv');          // ServerQuery Login can be created on "Extras/Tools" -> "ServerQuery Login"
  
  $ts3->socket_timeout = 10;                                                           // set custom socket timeout
  $ts3->img_path = '/'.$theme_path.'/scripts/ts3-viewer-class/images/';                   // set custom images path - do not use realpath()!
  $ts3->cache_path = '/sites/default/files/cache/ts3';                                   // set custom cache path (if filecache used)
  // $ts3->cache_handler = 'APC';                                                         // set cache handler directly to APC (Memcache, Xcache, APC & File are possible)
  $ts3->cache_timeout = 10;                                                           // set cache timeout to 2 minutes
  // $ts3->wildcard = null;                                                               // remove every first wildcard in channel tree
  // $ts3->player_trim = 15;                                                              // strip player names at after 15 chars
  // $ts3->chide['private'] = true;                                                       // hide channel "private" and all subchannels
  // $ts3->icons['client_is_recording'] = 1;                                              // add "player records" icon (required a icon named "client_is_recording.png")
  // $ts3->lang['stats']['traffic'] = 'Traffic:';                                         // change statistik language
  // unset($ts3->icons['client_flag_talking']);                                           // remove "player is talking" icon
  // unset($ts3->groups['sgroup']['6']);                                                  // remove "Server Admin" icon
  // $ts3->groups['sgroup'][7] = array('n' => 'Member', 'p' => 'member.png');             // give Servergroup ID #7 (Normal) a name and icon
  // $ts3->groups['sgroup'][8] = array('n' => 'Guest',  'p' => 'guest.png');              // give Servergroup ID #8 (Guest) a name and icon
  
  $ts3->build(); // build the content
  ?>
  <!--<meta http-equiv="refresh" content="30; URL=<?php echo $_SERVER['PHP_SELF']; ?>" />-->
  <link rel="stylesheet" type="text/css" href="/<?php echo $theme_path; ?>/scripts/ts3-viewer-class/stylesheet.css" />
  <table width="920" cellpadding="0" cellspacing="20" align="center" class="ts3table" border="0">
      <tbody>
          <tr>
              <td width="400" valign="top" class="bg">
                  <div style="float:left"><b><?php echo $ts3->tree_head(); ?></b></div>
                  <div style="float:right"><b><?php echo $ts3->useron(); ?></b></div>
                  <br style="clear:both"/>
                  <?php echo $ts3->tree(); ?>
              </td>
              <td width="500" valign="top" class="bg">
									<?php
                    global $user;
                    echo '<h2><a href="ts3server://88th.org/?port=9987';
                    if (isset($user->name)) echo '&nickname='.$user->name;
                    echo '">Connect to Server as "';
                    if (isset($user->name)) {
											echo $user->name;
										} else {
											echo 'Guest';
										}
										echo '"</a><span></h2>';
                  ?>
									<p style="text-align:right; padding-right: 18px;">Server connection requires <a href="http://teamspeak.com/">TeamSpeak 3</a> voice client.</p>
                  <!--<h2><?php echo $ts3->title(); ?></h2>
                  <h3><?php echo $ts3->website(); ?></h3>-->
                  <div align="center"><?php echo $ts3->banner(); ?></div><br />
                  <div align="center"><b>Statistics</b></div>
                  <?php echo $ts3->stats(); ?>
                  <br />
                  <div align="center"><b>Legend</b></div>
                  <?php echo $ts3->legend(); ?>
              </td>
          </tr>
      </tbody>
  </table>
</div>