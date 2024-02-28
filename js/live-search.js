document.addEventListener("DOMContentLoaded", () => {
  const searchField = document.querySelector("#live-search-field");
  const dropdown = document.querySelector(".search-bar__dropdown");

  const toggleDropdown = (show) => {
    dropdown.style.opacity = show ? "1" : "0";
    dropdown.style.pointerEvents = show ? "auto" : "none";
  };

  searchField.addEventListener("keyup", () => {
    const searchValue = searchField.value;

    if (searchValue.length > 0) {
      toggleDropdown(true);

      fetch(ajaxurl, {
        method: "POST",
        body: new URLSearchParams({
          action: "my_live_search",
          search: searchValue,
        }),
      })
        .then((response) => response.text())
        .then((data) => {
          document.querySelector("#live-search-results").innerHTML = data;
        });
    } else {
      toggleDropdown(false);
    }
  });

  document.addEventListener("click", (event) => {
    if (
      !searchField.contains(event.target) &&
      !dropdown.contains(event.target)
    ) {
      toggleDropdown(false);
    }
  });

  searchField.addEventListener("click", () => {
    if (searchField.value.length > 0) {
      toggleDropdown(true);
    }
  });
});
