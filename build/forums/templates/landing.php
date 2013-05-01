<?php
/*

Copyright (c) 2007 BeVolunteer

This file is part of BW Rox.

BW Rox is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BW Rox is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/> or 
write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330, 
Boston, MA  02111-1307, USA.

*/


$User = APP_User::login();
$TIGHT_THREADLIST = true;
$noForumLegendBox = true;
$noForumNewTopicButton = true;

?>

<?php
$ToogleTagCloud=true ;
if ($User) $TagCloud=true ;
if (!$User) {
?>
    <div class="subcolumns">
        <?=$this->words->getFormatted('ForumOnlyForBeWelcomeMember'); ?>
    </div>
<?php
} // end if not User
?> 
<!-- Now displays the recent groups post list -->
<div id="groups">
<?php
    echo $this->words->flushBuffer();
?>
<!--       <span class="float_right">
        <?= $this->words->get('GroupsSearchHeading'); ?>
        <form action="groups/search" method="get">
            <input type="text" name="GroupsSearchInput" value="" id="GroupsSearchInput" /><input type="submit" value="<?= $this->words->getSilent('GroupsSearchSubmit'); ?>" /><br />
        </form><?php echo $this->words->flushBuffer(); ?>
    </span> -->
    <h2><a href="groups/forums"><?php echo $this->words->getFormatted('Groups'); ?></a> <span class="small">&ndash; <?php echo $this->words->get('GroupsTagLine'); ?></span></h2>


<?php
    $uri = 'forums/';
if ($threads = $groups->getThreads()) {
    $groups->getTotalThreads(); ?>
<?php
        require 'boardthreads.php';



    if ($User && $moreLessThreadsCallbackId) {
?>
        <form class="morelessbuttons" method="post" action="<?php echo rtrim(implode('/', $request), '/').'/';?>">
            <input type="hidden" name="<?php echo $moreLessThreadsCallbackId; ?>"  value="1">
            <input type="hidden" name="agoragroupsthreadscountmoreless" value="moregroups">
            <input type="submit" name="submit" value="<?php echo $this->words->getSilent('ShowMore'); ?>">
        </form>

        <form class="morelessbuttons" method="post" action="<?php echo rtrim(implode('/', $request), '/').'/';?>">
            <input type="hidden" name="<?php echo $moreLessThreadsCallbackId; ?>"  value="1">
            <input type="hidden" name="agoragroupsthreadscountmoreless" value="lessgroups">
            <input type="submit" name="submit" value="<?php echo $this->words->getSilent('ShowLess'); ?>">
        </form>
<?php
    }
    if ($User && $ownGroupsButtonCallbackId) {
        if ($boards->owngroupsonly == "No") {
            $buttonText = $this->words->getBuffered('SwitchShowOnlyMyGroupsTopics');
        } else {
            $buttonText = $this->words->getBuffered('SwitchShowAllGroupsTopics');
        }
?>
        <form class="morelessbuttons" method="post" action="<?php echo rtrim(implode('/', $request), '/').'/';?>">
            <input type="hidden" name="<?php echo $ownGroupsButtonCallbackId; ?>"  value="1">
            <input type="submit" name="submit" value="<?php echo $buttonText; ?>">
        </form>
<?php
    echo $words->flushBuffer();
    }
?>
    <strong class="float_right"><a href="groups/forums"><?php echo $this->words->getFormatted('ShowGroupsForums'); ?></a></strong>
</div> <!-- Groups-->

<br /><br />

<?php
}
?>

<div id="forum">
<!-- Now displays the recent forum post list -->
<?php
if ($User) {
?>
    <span class="float_right">
        <form method="get" action="forums/new">
            <input type="submit" name="submit" value="<?= $this->words->getSilent('ForumNewTopic'); ?>">
        </form><?php echo $this->words->flushBuffer(); ?>
    </span>
<?php
}
?>
    <h2><a href="forums/bwforum"><?php echo $this->words->getFormatted('AgoraForum'); ?></a> <span class="small">&ndash; <?php echo $this->words->get('AgoraTagLine'); ?></span></h2>
<?php 
    $uri = 'forums/';
if ($threads = $forum->getThreads()) {
    $forum->getTotalThreads(); ?>
<?php
        require 'boardthreads.php';


    if ($User && $moreLessThreadsCallbackId) {
?>
        <form class="morelessbuttons" method="post" action="<?php echo rtrim(implode('/', $request), '/').'/';?>">
            <input type="hidden" name="<?php echo $moreLessThreadsCallbackId; ?>"  value="1">
            <input type="hidden" name="agoragroupsthreadscountmoreless" value="moreagora">
            <input type="submit" name="submit" value="<?php echo $this->words->getSilent('ShowMore'); ?>">
        </form>

        <form class="morelessbuttons" method="post" action="<?php echo rtrim(implode('/', $request), '/').'/';?>">
            <input type="hidden" name="<?php echo $moreLessThreadsCallbackId; ?>"  value="1">
            <input type="hidden" name="agoragroupsthreadscountmoreless" value="lessagora">
            <input type="submit" name="submit" value="<?php echo $this->words->getSilent('ShowLess'); ?>">
        </form>
<?php
    echo $words->flushBuffer();
    }
?>
    <strong class="float_right"><a href="forums/bwforum"><?php echo $this->words->getFormatted('ShowAgoraForum'); ?></a></strong> 
</div> <!-- Forum-->

<?php
}
?>

<br /><br />
<a href="rss/forumthreads"><img src="images/icons/feed.png" alt="RSS feed" /></a>
