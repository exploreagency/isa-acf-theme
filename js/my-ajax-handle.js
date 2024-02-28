jQuery(document).ready(function ($) {
  function getActiveFilters() {
    var filters = {};
    $(".content-type-filters__list li.active, .filter__list li.active").each(
      function () {
        var filterType =
          $(this).closest(".filter").length > 0
            ? $(this)
                .closest(".filter")
                .find(".filter__title")
                .text()
                .toLowerCase()
                .replace(/\s+/g, "-")
            : "content_type"; // Если элемент в content-type-filters__list, устанавливаем тип в 'content-type'

        if (!filters[filterType]) {
          filters[filterType] = [];
        }
        filters[filterType].push($(this).data("filter"));
      },
    );
    return filters;
  }

  $(".content-type-filters__button, .filter__list li").on("click", function () {
    $(this).toggleClass("active");
    var filters = getActiveFilters();
    console.log(filters); // Вывод активных фильтров

    $.ajax({
      url: ajaxurl,
      type: "POST",
      data: {
        action: "filter_posts",
        filters: filters,
      },
      success: function (response) {
        $(".blog__list").html(response);
      },
      error: function (error) {
        console.error("Filtering failed:", error);
      },
    });
  });
});
