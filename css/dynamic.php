<?php if( $options['logo'] ) : ?>
#site-title a {
	display: block;
	width: <?php echo $options['logowidth'] ?>px; height: <?php echo $options['logoheight'] ?>px;
	background: url(<?php echo $options['logo'] ?>) no-repeat;
	overflow: hidden;
	text-indent: -999px;
}
<?php endif; ?>
<?php if( $options['link'] ) : ?>
a:link {
	color: <?php echo $options['link'] ?>;
}
<?php endif; ?>
<?php if( $options['linkhover'] ) : ?>
a:hover {
	color: <?php echo $options['linkhover'] ?>;
}
<?php endif; ?>
<?php if( $options['footerbg'] ) : ?>
#footer {
	background: <?php echo $options['footerbg'] ?>;
}
<?php endif; ?>
<?php if( $options['footercolor'] ) : ?>
#footer {
	color: <?php echo $options['footercolor'] ?>;
}
<?php endif; ?>
<?php if( $options['footerlink'] ) : ?>
#footer a:link {
	color: <?php echo $options['footerlink'] ?>;
}
<?php endif; ?>
<?php if( $options['footerlinkhover'] ) : ?>
#footer a:hover {
	color: <?php echo $options['footerlinkhover'] ?>;
}
<?php endif; ?>
<?php if( $options['layout'] == 'cs' ) : ?>
#container {
	float: left;
	margin: 0 -240px 0 0;
}
#content {
	margin: 0 280px 0 20px;
}
#primary,
#secondary {
	float: right;
}
#secondary {
	clear: right;
}
<?php elseif( $options['layout'] == 'sc' ) : ?>
#container {
	float: right;
	margin: 0 0 0 -240px;
}
#content {
	margin: 0 20px 36px 280px;
}
#primary,
#secondary {
	float: left;
}
#secondary {
	clear: left;
}
<?php elseif( $options['layout'] == 'ssc' ) : ?>
#container {
	float: left;
	margin: 0;
}
#content {
	margin: 0 20px 36px 460px;
}
#primary {
	float: left;
	margin-left: -940px;
}
#secondary {
	float: left;
	margin-left: -700px;
}
<?php elseif( $options['layout'] == 'css' ) : ?>
#container {
	float: left;
	margin: 0;
}
#content {
	margin: 0 460px 36px 20px;
}
#primary {
	float: left;
	margin-left: -440px;
}
#secondary {
	float: left;
	margin-left: -220px;
}
<?php elseif( $options['layout'] == 'scs' ) : ?>
#container {
	float: left;
	margin: 0;
}
#content {
	margin: 0 220px 36px 220px;
}
#primary {
	float: left;
	margin-left: -940px;
}
#secondary {
	float: left;
	margin-left: -220px;
}
<?php endif; ?>