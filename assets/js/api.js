document.addEventListener("DOMContentLoaded", function () {
  const wordEl = document.querySelector(".word");
  const pronunciationEl = document.querySelector(".pronunciation");
  const posEl = document.querySelector(".part-of-speech");
  const definitionEl = document.querySelector(".definition");
  const exampleEl = document.querySelector(".example");
  const dateEl = document.querySelector(".date");

  const wordList = [
    "serendipity",
    "benevolent",
    "euphoria",
    "quintessential",
    "lucid",
  ];

  const today = new Date();
  dateEl.textContent = today.toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });

  // Choose a word of the day based on the date
  const index = today.getDate() % wordList.length;
  const word = wordList[index];

  fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`)
    .then((response) => response.json())
    .then((data) => {
      const entry = data[0];
      const meaning = entry.meanings[0];
      const definition = meaning.definitions[0];

      wordEl.textContent = entry.word;
      pronunciationEl.textContent = entry.phonetic || "";
      posEl.textContent = meaning.partOfSpeech || "";
      definitionEl.textContent =
        definition.definition || "No definition found.";
      exampleEl.textContent = definition.example || "";
    })
    .catch((error) => {
      console.error("Failed to fetch word:", error);
      wordEl.textContent = "Error loading word";
      definitionEl.textContent = "Check your internet or API limit.";
    });
});
