document.addEventListener("DOMContentLoaded", () => {
    const welcomeMessage = document.getElementById("welcomeMessage");

    // Hiển thị thông báo
    welcomeMessage.classList.add("show");

    // Ẩn thông báo sau khi animation kết thúc
    setTimeout(() => {
        welcomeMessage.classList.remove("show");
    }, 5000); // 5 giây
});