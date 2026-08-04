const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const book = document.querySelector("#book");

const paper1 = document.querySelector("#p1");
const paper2 = document.querySelector("#p2");
const paper3 = document.querySelector("#p3");

let currentLocation = 1;
const numOfPapers = 3;
const maxLocation = numOfPapers + 1;
function updateButtonState() {
  if (currentLocation === 1||currentLocation==2) {
    prevBtn.style.display = "none";
    nextBtn.style.display = "none";
  } else {
    prevBtn.style.display = "inline-block";
    nextBtn.style.display = "inline-block";
  }
}


prevBtn.addEventListener("click", goPrevPage);
nextBtn.addEventListener("click", goNextPage);

// You don't need to wait for DOMContentLoaded in this case.
window.addEventListener("message", (event) => {
  if (event.data === "startClicked") {
    console.log("Start button clicked in iframe");
    goNextPage(); // This should flip to the next page in your flipbook
  }
});



function openBook() {
  book.style.transform = "translateX(50%)";
  prevBtn.style.transform = "translateX(-180px)";
  nextBtn.style.transform = "translateX(180px)";
}

function closeBook(atBeginning) {
  book.style.transform = atBeginning ? "translateX(0%)" : "translateX(100%)";
  prevBtn.style.transform = "translateX(0px)";
  nextBtn.style.transform = "translateX(0px)";
}

function goNextPage() {
  if (currentLocation < maxLocation) {
    switch (currentLocation) {
      case 1:
        openBook();
        paper1.classList.add("flipped");
        paper1.style.zIndex = 1;
        break;
      case 2:
        paper2.classList.add("flipped");
        paper2.style.zIndex = 2;
        break;
      case 3:
        paper3.classList.add("flipped");
        paper3.style.zIndex = 3;
        closeBook(false);
        break;
    }
    currentLocation++;
     updateButtonState(); // ✅ Add this here
  }
}

function goPrevPage() {
  if (currentLocation > 1) {
    switch (currentLocation) {
      case 2:
        closeBook(true);
        paper1.classList.remove("flipped");
        paper1.style.zIndex = 4;
        break;

      case 3:
        paper2.classList.remove("flipped");
        paper2.style.zIndex = 3;
        break;

      case 4: // Coming from paper4, now want to see paper3 again
        paper3.classList.remove("flipped");
        paper3.style.zIndex = 2; // <-- This should now become highest visible
        openBook(); // keeps book open while navigating back
        break;
    }

    currentLocation--;
    updateButtonState();
  }
}


 updateButtonState(); // ✅ Add this here
