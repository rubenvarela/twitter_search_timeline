<?php

require_once('./twitter_search_timeline.php');

$includeFile = file_get_contents ( 'http://api.ustream.tv/json/channel/fortalezapr/getValueOf/status?key=4D1869A6089C22AC737C29A041DE4ACC' );
$json_output = json_decode ( $includeFile );
$live = $json_output->results;

/* To test uncomment the following line: */
/*$live = "live";*/

if ( $live === 'live' ) {
  ?>
  <div style="margin-bottom:-20px;">
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td width="24" align="left" valign="middle" bgcolor="#333333">
          <img src="/img/record_icon.png" width="24" height="24" alt="En Directo" />
        </td>
        <td align="right" valign="middle" bgcolor="#333333">
          <div align="left" style="width:180px; float:left;">
            <img src="/img/endirecto_text.png" width="180" height="24" />
          </div>
          <div class="live_text_link">
            <a href="/envivo" class="live_text_link"><?php print get_tweet(); ?></a>
          </div>
        </td>
      </tr>
    </table>
    <br/>
    <br/>
  </div>
<?php }