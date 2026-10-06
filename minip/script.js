const searchInput = document.getElementById("searchInput");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        const searchValue =
            this.value.toLowerCase();

        const books =
            document.querySelectorAll(".book-card");

        books.forEach(function (book) {

            const text =
                book.innerText.toLowerCase();

            if (text.includes(searchValue)) {
                book.style.display = "";
            } else {
                book.style.display = "none";
            }

        });

    });

}
