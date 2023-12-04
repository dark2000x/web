<?php
$con = mysqli_connect("localhost","root","","librarydb");
$qurery1 = "select * from books";
$result1 = mysqli_query($con,$qurery1);

if(isset($_POST["btnupdate"])){

    $bookId = $_POST["select"];
    $bookName = $_POST["txtnewbookname"];
    $bookAuthor = $_POST["txtnewauthorname"];

    if($bookName != null && $bookAuthor != null){
        $qurery2 = "update books SET bookname='$bookName',bookauthor='$bookAuthor' where bookid = $bookId ";
        $result2 = mysqli_query($con,$qurery2);

    }else{
        false;
        ?> 
            <script>
                alert("need fill the new book name and author");
            </script>
    <?php }

   


}


?>


<html>
<body>
    <h1>Edit Book Information</h1>
    <form id="form1" name="form1" method="post">
    <label>Select the book : </label>
    <select name="select" id="select">
    <option value=""> -- Select One -- </option>
    <?php foreach($result1 as $raw) { ?>
    <option value="<?php echo $raw['bookid']?>"><?php echo $raw['bookname']?></option>
    <?php } ?>
    </select>
    <br><br>
    <label>New Book Name : </label>
    <input type="text" name="txtnewbookname" /><br><br>
    <label>New Author Name : </label>
    <input type="text" name="txtnewauthorname" /><br><br>
    <input type="submit" value="Update" name="btnupdate" /><br><br>
    </form>
</body>
</html>