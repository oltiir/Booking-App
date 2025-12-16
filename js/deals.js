var deals = [
    {
        city: "Paris",
        category: "city",
        price: 129,
        nights: 4,
        img: "/images/paris.jpg",
        expires: Date.now() + 86400000
    },
    {
        city: "Vienna",
        category: "city",
        price: 99,
        nights: 3,
        img: "/images/vienna.jpg",
        expires: Date.now() + 43200000
    },
    {
        city: "Istanbul",
        category: "beach",
        price: 115,
        nights: 4,
        img: "/images/turkiye.jpg",
        expires: Date.now() + 65000000
    }
];

var grid = document.getElementById("dealsGrid");
var filter = document.getElementById("filterCategory");
var sort = document.getElementById("sortPrice");

function renderDeals(list) {
    grid.innerHTML = "";

    for (var i = 0; i < list.length; i++) {
        var deal = list[i];

        var card = document.createElement("div");
        card.className = "deal-card";

        card.innerHTML =
            '<img src="' + deal.img + '" class="deal-image">' +
            '<div class="deal-body">' +
                '<h3>' + deal.city + '</h3>' +
                '<div class="deal-meta">' + deal.nights + ' nights • Special offer</div>' +
                '<div class="deal-bottom">' +
                    '<div class="price">€' + deal.price + '/night</div>' +
                    '<div class="wishlist">♡</div>' +
                '</div>' +
                '<div class="timer"></div>' +
            '</div>';

        grid.appendChild(card);

        startTimer(card.querySelector(".timer"), deal.expires);
        attachWishlist(card.querySelector(".wishlist"));
    }
}

function attachWishlist(el) {
    el.onclick = function () {
        if (el.textContent === "♡") {
            el.textContent = "❤️";
        } else {
            el.textContent = "♡";
        }
    };
}

function startTimer(timerEl, endTime) {
    setInterval(function () {
        var diff = endTime - Date.now();

        if (diff <= 0) {
            timerEl.textContent = "Expired";
            return;
        }

        var hours = Math.floor(diff / 3600000);
        var minutes = Math.floor((diff % 3600000) / 60000);

        timerEl.textContent = "⏳ " + hours + "h " + minutes + "m left";
    }, 1000);
}

filter.onchange = updateDeals;
sort.onchange = updateDeals;

function updateDeals() {
    var result = [];

    for (var i = 0; i < deals.length; i++) {
        if (filter.value === "all" || deals[i].category === filter.value) {
            result.push(deals[i]);
        }
    }

    if (sort.value === "low") {
        result.sort(function (a, b) {
            return a.price - b.price;
        });
    }

    if (sort.value === "high") {
        result.sort(function (a, b) {
            return b.price - a.price;
        });
    }

    renderDeals(result);
}

renderDeals(deals);
