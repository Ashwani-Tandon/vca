
<!DOCTYPE HTML>
<html>
	<head>
		<title>Maze Of Lethe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="logo">MAZE OF LETHE </a>				
			</header>


		<!-- Two -->
			<article id="two" class="post invert style1 alt">
				<div class="image">
					<img src="<?php echo $res_question['img_path'].$res_question['img1_name']; ?>" alt="" data-position="10% center" />
				</div>
        		<div class="content">
					<div class="inner">
						<header>
							<h3>QUESTION</h3>

						</header>
						<p>Player Name here</p>

							<form method="post">
								<div>
									<input type="text" class="submit-button" placeholder="ANSWER" style="text-color=white" name="answer" required=""><br>
									<button class="button alt" name="submit_answer">NEXT</button>
							    </div>
							</form>

					</div>

				</div>
			</article>



		<!-- Footer -->
				<div class="copyright">
				 All Right Reserved:  <a href="https://www.createch.co.in">CREATECH</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
      <script language="javascript">
        document.onmousedown=disableclick;

        function disableclick(event)
        {
          if(event.button==2)
           {

             return false;
           }
        }
      </script>

	</body>
</html>

