const smallScreen = window.matchMedia("(max-width: 600px)");

            if (smallScreen.matches) {
            const elementsToHide = document.querySelectorAll(".logoisepbike, .ligne2");
            for (let element of elementsToHide) {
            element.style.display = "none";
            }
            }
            else{
                const elementsToHide2 = document.querySelectorAll(".navbar");
                for (let element of elementsToHide2) {
                element.style.display = "none";
                }
            }