<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
    <head>
        <?php echo $this->Html->charset(); ?> 
        
        <!--     Devsite by @C1V0, FOSS.
   ___ __        
 _{___{__}\      Buy it, use it, break it, fix it,
{_}      `\)     trash it, change it, mail - upgrade it.
{_}        `            _.-''''--.._
{_}                    //'.--.  \___`.
{ }__,_.--~~~-~~~-~~-::.---. `-.\  `.)
 `-.{_{_{_{_{_{_{_{_//  -- 8;=- `
    `-:,_.:,_:,_:,.`\\._ ..'=- , 
        // // // //`-.`\`   .-'/
 jgs   << << << <<    \ `--'  /----)
        ^  ^  ^  ^     `-.....--'''
        -->
        
        <title><?php echo $title_for_layout; ?> | <?php echo $siteDescription; ?> </title>
        
        <?php if (isset($description_for_layout) && !empty($description_for_layout)) echo $this->Html->meta('description', $description_for_layout); ?>
        
        <?php echo $this->Html->meta('og:title', null, array('title' => 'og:title', 'content' => $title_for_layout . ' | ' . Configure::read('Site.name') . ' ' . Configure::read('Site.headline'))); ?> 
        <?php if (isset($description_for_layout) && !empty($description_for_layout)) echo $this->Html->meta(array('title' => 'og:description', 'content' => $description_for_layout)); ?> 
        <meta title="og:image" content="<?php echo $this->Html->url('/theme/Devsite/img/icon/touch144.png'); ?>" />
        <?php echo $this->Html->meta('viewport', null, array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0')); ?> 
        <?php echo $this->Html->meta('icon'); ?> 
        <?php echo $this->fetch('meta'); ?> 
        
        <?php echo $this->Html->css('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css'); ?> 
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?> 
        <?php echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'); ?>  
        <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Titillium+Web:400,300,400italic,700'); ?> 
        <?php echo $this->Html->css('core'); ?> 
        <?php echo $this->Html->css('devsite'); ?>
        <?php if ($this->params->here === '/') echo $this->Html->css('/DpSocialTimeline/css/dpSocialTimeline.css'); ?>  
        <?php echo $this->Html->css('/GithubRepoWidget/css/githubRepoWidget.css'); ?> 
        <?php echo $this->fetch('css'); ?> 

        <style type="text/css">
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
        
        <!-- Le fav and touch icons -->
        <?php echo $this->Html->meta('icon', $this->Html->url('/theme/Devsite/favicon.ico')); ?> 
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->Html->url('/theme/Devsite/img/icon/touch144.png'); ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->Html->url('/theme/Devsite/img/icon/touch114.png'); ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->Html->url('/theme/Devsite/img/icon/touch72.png'); ?>" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo $this->Html->url('/theme/Devsite/img/icon/touch.png'); ?>" />
        <link rel="shortcut icon" href="#">
        
        <?php echo $this->Html->script('http://code.jquery.com/jquery-1.10.1.min.js', array('inline' => false)); ?> 
        <?php echo $this->Html->script('libs/bootstrap.min', array('inline' => false)); ?> 
    </head>
    <body>
        <?php echo $this->element('menu/top_menu'); ?>

        <?php if ($this->params->here !== '/') echo $this->element('header/masthead'); ?>
        <?php if ($this->params->here === '/') echo $this->element('header/jumbotron'); ?>
        <?php if ($this->params->here === '/') echo $this->element('pane/social'); ?>

        <div id="content" class="container-fluid">
            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?> 

            <!-- Footer
            ================================================== -->
            <footer>
            <div class="row-fluid">
                <hr />
                <p>
                    &copy; 2013 Chris Vogt<br />
                    Powered by <?php echo $this->Html->link('CakePHP', 'http://cakephp.org'); ?> and <?php echo $this->Html->link('CakePHP Devsite', 'http://github.com/chrisvogt/cakephp-devsite'); ?> 
                </p>
            </div>
            </footer>
        </div><!-- #content .container-fluid -->
        
        <?php if ($this->params->here === '/') echo $this->element('modal/status'); ?> 
        <?php if ($_SERVER['SERVER_NAME'] == 'chrisvogt.me' || $_SERVER['SERVER_NAME'] == 'chrisvogt.local' || $_SERVER['SERVER_NAME'] == 'www.chrisvogt.me') echo $this->element('analytics'); ?> 
        
        <!-- Le javascript
        ================================================== -->    
        <?php echo $this->Js->writeBuffer(array('inline' => true, 'safe' => true)); ?> 
        <?php echo $this->fetch('script'); ?> 
        <?php echo $this->fetch('scriptBottom'); ?> 
        <?php if ($this->params->here === '/') { ?> 
        <script type="text/javascript">
            // <![CDATA[
            jQuery(document).ready(function() {

                jQuery("#socialTimeline").dpSocialTimeline({
                    custom:
                            {
                                "StumbleUpon": {name: "StumbleUpon", url: "http://www.stumbleupon.com/rss/stumbler/chr1sv0gt/likes", icon: "http://www.mylocally.com/images/stumbleupon16x16.gif", limit: "10"}
                            },
                    layoutMode: "columns",
                    addColorbox: 0,
                    showSocialIcons: 1,
                    showFilter: 0,
                    showLayout: 0,
                    total: 5,
                    itemWidth: "164",
                    skin: "light",
                    lang_week: "week",
                    lang_weeks: "weeks",
                    lang_day: "day",
                    lang_days: "days",
                    lang_hour: "hour",
                    lang_hours: "hours",
                    lang_minute: "minute",
                    lang_minutes: "minutes",
                    lang_about: "about",
                    lang_ago: "ago",
                    lang_less: "Less than a minute ago",
                    nonce: "dp_timeline_id568482929"
                });

            });

            //]]>
        </script>
        <?php } ?> 
    </body>
</html>