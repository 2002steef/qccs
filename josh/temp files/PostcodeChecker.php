<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teus Formulier</title>
</head>

<body>
<table>
    <tbody><tr><td>Postcode</td>	<td><input type="text" id="postcode_p postcode" onkeyup="check_pc(&quot;postcode&quot;,this.value)" autofocus=""></td></tr>
    <tr><td>Huisnummer</td>	<td><input type="text" id="huisnr_p" onkeyup="check_pc(&quot;huisnr&quot;,this.value)"></td></tr>
    <tr><td>Toevoeging</td>	<td><input type="text" id="toevoeging_p" onkeyup="check_pc(&quot;toevoeging&quot;,this.value)"></td></tr>
    <tr><td>Straat</td>		<td><input type="text" id="straat_p"></td></tr>
    </tbody></table>
<script>
    /*
        Notice aan 'slimme programmeurs' die denken de hier gebruikte apikey te kunnen achterhalen en te gebruiken:
        Spaar je de moeite. Je kunt inderdaad die apikey achterhalen. Maar het gaat toch niet werken. Het werkt alleen met een zelf aangevraagde apikey.
        Dus vraag die apikey gewoon aan, gebruik de gratis calls om te testen. Kleine moeite, groot gemak.
        Bijzondere situatie? Neem gewoon contact op.
    */
    var e		= "FbW29C_969cyVfAKrj";
    var postcode	= "";
    var huisnr		= "";
    var toevoeging	= "";

    function check_pc(wat,waarde) {
        if (wat=="postcode") {
            var pc = waarde.trim();
            if (pc.length <6) {maak_leeg();return;}					// POSTCODE MOET MINIMAAL 6 CHARACTERS BEVATTEN
            var num_deel = pc.substr(0,4);
            if (parseFloat(num_deel) < 1000) {maak_leeg();return;}	// HET NUMERIEKE DEEL MOET MINIMAAL 1000 ZIJN
            var alpha_deel = pc.substr(-2);
            if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122 ) {maak_leeg();return;} 	// DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
            alpha_deel = alpha_deel.toUpperCase();

            // NU WETEN WE ZEKER EEN POSTCODE TE HEBBEN DIE BEGINT MET 4 LETTERS EN EINDIGT OP 2 CIJFERS

            postcode = num_deel+alpha_deel;
            document.getElementById("postcode_p").value = postcode;
        }

        if (wat=="huisnr") {
            huisnr = parseFloat(waarde);
            if (!huisnr) {maak_leeg();return;}
            document.getElementById("huisnr_p").value = huisnr;
        }

        if (wat=="toevoeging") {
            toevoeging = waarde.trim();
            document.getElementById("toevoeging_p").value = toevoeging;
        }

        if (huisnr==0) {return;}

        var getadrlnk	= 'https://bwnr.nl/postcode.php?pc='+postcode+'&hn='+huisnr+'&tv='+toevoeging+'&tg=data&ak='+'FbW29C_969cyVfAKrj';	// e moet uw apikey bevattten.

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                rString = this.responseText;
                if (rString=="Geen resultaat.") {maak_leeg();return;}
                if (rString=="Input onvolledig.") {maak_leeg();return;}
                if (rString=="Onbekende API Key.") {maak_leeg();return;}
                if (rString=="Over quota") {maak_leeg();return;}
                if (rString=="Onjuiste API Key.") {maak_leeg();alert('Alleen functioneel indien geopend vanuit de API pagina. Ga terug naar de API pagina en probeer opnieuw.');return;}

                aResponse = rString.split(";");
                document.getElementById("straat_p").value=aResponse[0];
                document.getElementById("plaats").value=aResponse[1];
            }
        };

        xmlhttp.open("GET", getadrlnk , true);
        xmlhttp.send();
    }

    function maak_leeg() {
        document.getElementById("straat_p").value="";
        document.getElementById("plaats").value="";
    }

</script>


</body></html>