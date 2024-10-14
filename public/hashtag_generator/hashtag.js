const generateBtn = document.getElementById("generate-btn");
const hashtagInput = document.getElementById("hashtag-input");
const hasilDiv = document.getElementById("hasil");
const copyBtn = document.getElementById("copy-btn");
const alertPlaceholder = document.getElementById("alert-placeholder");
const selectAllBtn = document.getElementById("select-all-btn");

const showAlert = (message, type = "warning") => {
  alertPlaceholder.innerHTML = `
    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `;
};

generateBtn.addEventListener("click", async () => {
  const query = hashtagInput.value.trim();
  if (query === "") {
    showAlert("Silakan masukkan hashtag", "warning");
    return;
  }

  try {
    const response = await fetch(`/generate-hashtags?query=${encodeURIComponent(query)}`);
    const result = await response.json();

    if (response.ok) {
      const hashtags = result.data.results;

      if (!hashtags || hashtags.length === 0) {
        showAlert("Tidak ada hashtag yang ditemukan untuk topik ini.", "info");
        hasilDiv.innerHTML = "";
        return;
      }

      const hasil = hashtags
        .map(
          (item, index) => `
          <div class="hashtag-item">
            <input type="checkbox" id="hashtag-${index}" value="${item}">
            <label for="hashtag-${index}">${item}</label>
          </div>
        `
        )
        .join("");

      hasilDiv.innerHTML = hasil;
      hasilDiv.style.maxHeight = "200px";
      hasilDiv.style.overflowY = "auto";
    } else {
      showAlert(result.error || "Gagal mengambil data dari server.", "danger");
      hasilDiv.innerHTML = "";
    }
  } catch (error) {
    console.error(error);
    showAlert("Terjadi kesalahan saat mengambil data. Silakan coba lagi nanti.", "danger");
    hasilDiv.innerHTML = "";
  }
});

selectAllBtn.addEventListener("click", () => {
  const checkboxes = hasilDiv.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach((checkbox) => {
    checkbox.checked = true;
  });
  showAlert("Semua hashtag telah dipilih.", "success");
});

copyBtn.addEventListener("click", () => {
  const selectedHashtags = Array.from(hasilDiv.querySelectorAll('input[type="checkbox"]:checked')).map((checkbox) => checkbox.value);
  if (selectedHashtags.length === 0) {
    showAlert("Silakan pilih setidaknya satu hashtag untuk disalin.", "warning");
    return;
  }

  const copyText = selectedHashtags.join(" ");
  navigator.clipboard
    .writeText(copyText)
    .then(() => {
      showAlert(`Hashtags telah dicopy: ${copyText}`, "success");
    })
    .catch(() => {
      showAlert("Gagal menyalin hashtags.", "danger");
    });
});
