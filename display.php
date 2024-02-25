<style>
<?php include 'style.css'; ?>
</style>

<div class = "head">
<button class = "add_button">+ Add New Record</button>
<form action="search.php" method="post">
Search
<input type="text" name="song_code" placeholder= "Search">
<input type="submit" value="Search">

</form>
</div>

<?php



$xml = new domdocument();
$xml->load("songs.xml");

$songs = $xml->getElementsByTagName("song");

$output = ""; 
foreach($songs as $song){

    $songNo = $song->getAttribute("song_code");
    $songTitle = $song->getElementsByTagName("title")[0]->nodeValue;
    $songGenre = $song->getElementsByTagName("genre")[0]->nodeValue;
    $songAlbum = $song->getElementsByTagName("album")[0]->nodeValue;

    $singersTemp = $song->getElementsByTagName("singer");
    $songSingersArray = [];
    foreach($singersTemp as $singer){
        $songSingers = $singer->nodeValue;
        $songSingersArray[] = $songSingers;
    }

    
    $output .= "<tr>
    <td> $songNo </td>
    <td> $songTitle </td>
    <td> $songGenre </td>
    <td> $songAlbum </td>
    <td> " . implode(", ", $songSingersArray) . "</td>
    <td> <button class = 'update_button'>Edit</button> 
    <button class = 'delete_button'>Delete</button></td>
</tr>";



      
    


    }
    echo "<table class='song-table'>
    <tr>
        <th> Song Code </th>
        <th> Title </th>
        <th> Genre </th>
        <th> Album </th>
        <th> Singers </th>
        <th> Action </th>
    </tr> $output </table>";



?>

