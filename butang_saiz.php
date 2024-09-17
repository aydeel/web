<br>
<!-- Fungsi mengubah saiz tulisan bagi kepelbagaian pengguna -->
<script>
    function resizeText(multiplier) {
        var elem = document.getElementById("besar");
        var currentSize = elem.style.fontSize || 1;
        if(multiplier==2)
    {
        elem.style.fontSize = "1em";
    }
    else
    {
        elem.style.fontSize = ( parseFloat(currentSize) + (multiplier * 0.2)) + "em";
    }
}
</script>

<!-- Kod untuk mengubah saiz tulisan -->
| ubah saiz tulisan |
<input class='w3-buttom w3-white w3-border w3-border-teal w3-round' name='reSize1' type='button' value='reset' onclick="resizeText(2)" />
<input class='w3-buttom w3-white w3-border w3-border-teal w3-round' name='reSize' type='button' value='&nbsp;+&nbsp;' onclick="resizeText(1)" />
<input class='w3-buttom w3-white w3-border w3-border-teal w3-round' name='reSize2' type='button' value='&nbsp;-&nbsp;' onclick="resizeText(-1)" />
|