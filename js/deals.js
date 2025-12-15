const deals = [
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
        city: "Stanbul",
        category: "beach",
        price: 115,
        nights: 4,
        img: "/images/turkiye.jpg",
        expires: Date.now() + 65000000
    }
];

const grid = document.getElementById("dealsGrid");
const filter = document.getElementById("filterCategory");
const sort = document.getElementById("sortPrice");

function renderDeals(list) {
    grid.innerHTML = "";
    list.forEach(d => {
        grid.innerHTML += `
        <div class="deal-card">
            <img src="${d.img}" class="deal-image">
            <div class="deal-body">
                <h3>${d.city}</h3>
                <div class="deal-meta">${d.nights} nights • Special offer</div>

                <div class="deal-bottom">
                    <div class="price">€${d.price}/night</div>
                    <div class="wishlist">♡</div>
                </div>

                <div class="timer" data-exp="${d.expires}"></div>
            </div>
        </div>
        `;
    });
    startTimers();
}

function startTimers() {
    document.querySelectorAll(".timer").forEach(t => {
        const end = t.dataset.exp;
        setInterval(() => {
            const diff = end - Date.now();
            if (diff <= 0) {
                t.textContent = "Expired";
                return;
            }
            const h = Math.floor(diff / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            t.textContent = `⏳ ${h}h ${m}m left`;
        }, 1000);
    });
}

filter.onchange = () => {
    let result = [...deals];
    if (filter.value !== "all") {
        result = result.filter(d => d.category === filter.value);
    }
    renderDeals(result);
};

sort.onchange = () => {
    let result = [...deals];
    if (sort.value === "low") result.sort((a,b) => a.price - b.price);
    if (sort.value === "high") result.sort((a,b) => b.price - a.price);
    renderDeals(result);
};

renderDeals(deals);
