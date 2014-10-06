<html>
 <head>
  <title>PHP Test</title>
  <script type="text/javascript">

	function showNumber(){

	var num = parseInt (document . money . number . value);
	if (isNaN (num))
		return;
	document.write("Your intended amount of money is: " + num + "<br>");
	}

	</script>
 </head>
 <body>
 <?php echo '<p>Enter the amount of money you want to invest in this project:</p>'; ?> 
 <form name=money>
 <input type="number" id="number" name="number" />
 <button type="button" onclick="showNumber();">Fund this project</button>
 </form>
 </body>
</html>