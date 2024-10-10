<script>
    async function getFrangiputeAmandes(requiredId) {
        let url = "./Routes/getFrangiputeAmandes.php?id=" + requiredId;
        await fetch(url, { method: 'GET' })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("C'cassé");
                }

                let parsedResponse = response.text();
                return parsedResponse;
            })
            .then((data) => {
                console.log(data);

                return data;
            }
            ).catch((error) => {
                console.log('There has been a problem:', error);
            });
    }

    async function createNewFragipute(amandes, quantity) {
        let url = "./Routes/createNewFrangipute.php";
        let formData = new FormData();
        formData.append("amandes", amandes)
        formData.append("quantity", quantity)
        await fetch(url, { method: 'POST', body: formData })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("C'cassé");
                }

                let parsedResponse = response.text();
                return parsedResponse;
            })
            .then((data) => {
                return data;
            }
            ).catch((error) => {
                console.log('There has been a problem:', error);
            });
    }

    let dbRequest = getFrangiputeAmandes(6);
    createNewFragipute("En poudre de perlimpimpin", 457);
</script>