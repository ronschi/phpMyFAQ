<?php
/**
 * Sessionbrowser
 *
 * PHP Version 5.3
 *
 * This Source Code Form is subject to the terms of the Mozilla Public License,
 * v. 2.0. If a copy of the MPL was not distributed with this file, You can
 * obtain one at http://mozilla.org/MPL/2.0/.
 *
 * @category  phpMyFAQ
 * @package   Administration
 * @author    Thorsten Rinne <thorsten@phpmyfaq.de>
 * @copyright 2003-2013 phpMyFAQ Team
 * @license   http://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
 * @link      http://www.phpmyfaq.de
 * @since     2003-02-24
 */

if (!defined('IS_VALID_PHPMYFAQ')) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']));
    exit();
}
if ($permission['viewlog']) {

    $perpage   = 50;
    $day       = PMF_Filter::filterInput(INPUT_POST, 'day', FILTER_VALIDATE_INT);
    $firstHour = mktime (0, 0, 0, date('m', $day), date('d', $day), date('Y', $day));
    $lastHour  = mktime (23, 59, 59, date('m', $day), date('d', $day), date('Y', $day));
    
    $session     = new PMF_Session($faqConfig);
    $sessiondata = $session->getSessionsbyDate($firstHour, $lastHour);
    $date        = new PMF_Date($faqConfig);
?>
        <header>
            <h2><i class="icon-tasks"></i> <?php echo $PMF_LANG['ad_sess_session'] . ' ' . date("Y-m-d", $day); ?></h2>
        </header>

        <table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $PMF_LANG['ad_sess_ip']; ?></th>
                <th><?php echo $PMF_LANG['ad_sess_s_date']; ?></th>
                <th><?php echo $PMF_LANG['ad_sess_session']; ?></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($sessiondata as $sid => $data) {
?>
            <tr>
                <td><?php echo $data['ip']; ?></td>
                <td><?php echo $date->format(date("Y-m-d H:i", $data['time'])); ?></td>
                <td><a href="?action=viewsession&amp;id=<?php echo $sid; ?>"><?php echo $sid; ?></a></td>
            </tr>
<?php
    }
?>
        </tbody>
        </table>
<?php
} else {
    echo $PMF_LANG['err_NotAuth'];
}