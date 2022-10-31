var e = "FbW29C_969cyVfAKrj";
var postcode = "";
var huisnr = "";
var toevoeging = "";

function check_pc(wat, waarde) {
    if (wat === "postcode") {
        var pc = waarde.trim();
        if (pc.length < 6) {
            maak_leeg();
            return;
        } // moet minimaal 6 characters hebben
        var num_deel = pc.substr(0, 4);
        if (parseFloat(num_deel) < 1000) {
            maak_leeg();
            return;
        } // moet minaal 1000 zijn
        var alpha_deel = pc.substr(-2);
        if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122) {
            maak_leeg();
            return;
        } // DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
        alpha_deel = alpha_deel.toUpperCase();

        // de checker niffo

        postcode = num_deel + alpha_deel;
        document.getElementById("postcode_p").value = postcode;
        document.getElementById("postcode_z").value = postcode;
    }

    if (wat === "huisnr") {
        huisnr = parseFloat(waarde);
        if (!huisnr) {
            maak_leeg();
            return;
        }
        document.getElementById("huisnr_p").value = huisnr;
        document.getElementById("huisnr_z").value = huisnr;
    }

    if (wat === "toevoeging") {
        toevoeging = waarde.trim();
        document.getElementById("toevoeging_p").value = toevoeging;
        document.getElementById("toevoeging_z").value = toevoeging;
    }

    if (huisnr === 0) {
        return;
    }

    var getadrlnk = 'https://bwnr.nl/postcode.php?pc=' + postcode + '&hn=' + huisnr + '&tv=' + toevoeging + '&tg=data&ak=' + 'FbW29C_969cyVfAKrj'; // e moet uw apikey bevattten.

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            rString = this.responseText;
            if (rString === "Geen resultaat.") {
                maak_leeg();
                return;
            }
            if (rString === "Input onvolledig.") {
                maak_leeg();
                return;
            }
            if (rString === "Onbekende API Key.") {
                maak_leeg();
                return;
            }
            if (rString === "Over quota") {
                maak_leeg();
                return;
            }
            if (rString === "Onjuiste API Key.") {
                maak_leeg();
                alert('Alleen functioneel indien geopend vanuit de API pagina. Ga terug naar de API pagina en probeer opnieuw.');
                return;
            }
            // 0 = straat - 1 = plaats
            aResponse = rString.split(";");
            document.getElementById("straat_p").value = aResponse[0];
            document.getElementById("straat_z").value = aResponse[0];
            document.getElementById("plaats_p").value = aResponse[1];
            document.getElementById("plaats_z").value = aResponse[1];
        }
    };

    xmlhttp.open("GET", getadrlnk, true);
    xmlhttp.send();
}

function maak_leeg() {
    document.getElementById("straat_p").value = "";
    document.getElementById("plaats_p").value = "";
    document.getElementById("straat_z").value = "";
    document.getElementById("plaats_z").value = "";
}