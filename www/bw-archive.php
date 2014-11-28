<?php header( "HTTP/1.0 410 Gone" ); ?>
<HTML><HEAD><TITLE>The UCC Webcam archive is no longer available</TITLE></HEAD>
<BODY BGCOLOR=white>
<P>The UCC webcam archive is no longer available.</P>
</BODY></HTML>
<?php exit(); ?>
<?php if ( !isset( $broken ) ) { $broken = 0; if ( filemtime("../bw-webcam.jpg")<(time()-5*60) ) $broken = 1; } 
	$count = 0;
	$WEBCAM = "/home/ucc/devenish/webcam/bw-archives/today";

	$count = (integer)exec( "cat $WEBCAM/bw-count" );
	$requested = (integer)$QUERY_STRING;
	if ( $requested < 1 ) $requested = $count;
?>
<?php header("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT"); ?>
<HTML><HEAD><META HTTP-EQUIV=REFRESH CONTENT="<?php if ( $broken ) echo "300"; else echo "60"; ?>;URL=./"><TITLE>UCC B&amp;W Webcam</TITLE></HEAD>
<BODY BGCOLOR=white>
<P>The UCC B&amp;W webcam is a monochrome camera running off a Quadra 660/AV known as kormoran.</A></P>
<P>The UCC also has a <A HREF='./archive'>colour camera</A>.</P>
<?php if ( $broken ): ?>
<P><FONT COLOR='fushia'><EM>The webcam is currently off-line so no new images are being created.</EM></FONT></P>
<?php endif; ?>
<?php if ( $count ): ?>
<P>
<FONT COLOR='navy'><EM>The most recent picture is number <a href='bw-archive?<?echo $count?>'><?echo $count?></a>.</EM></FONT>
</P>
<?php endif; ?>
<?php if ( $requested ): ?>
<h2>Image <?echo $requested?> of <?echo $count?></h2>
<P>
[ <A <?php echo ( $requested > 1  && $count > 0)?"href":"name"; echo "='bw-archive?1"; ?>'>First</A> |
<A <?php echo ( $requested > 1  && $count > 0)?"href":"name"; echo "='bw-archive?".($requested-1); ?>'>Previous</A> |
<A <?php echo ( $requested < $count && $count > 0 )?"href":"name"; echo "='bw-archive?".($requested+1); ?>'>Next</A> |
<A <?php echo ( $requested < $count && $count > 0 )?"href":"name"; echo "='bw-archive?".($count); ?>'>Last</A> ]
</P>
<img src='bw-webcam.php?<?echo $requested?>' alt='Image <?echo $requested?>' />
<?php else: ?>
There are no images to display.
<?php endif; ?>
<P>Back to the latest <A HREF="/">webcam images</A>.</P>
<P>Check out the <A HREF="http://www.ucc.gu.uwa.edu.au/">UCC web page</A>.</P>
<?php if ( $broken ) : ?>
<P><FONT SIZE='-1'>This page generated at <?php echo date( "g:i A D d M Y", filemtime("../bw-webcam.jpg") ); ?>.</FONT></P>
<?php endif; ?>
</BODY>
<HTML>
