const searchTerm = "news écologie";  // Terme de recherche

// Création de l'URL de l'API de NewsAPI avec le terme de recherche
const apiUrl = `https://newsapi.org/v2/everything?q=${encodeURIComponent(searchTerm)}&sortBy=publishedAt&apiKey=92e47a9623ed4cb487bc9a60f6a7166b`;  
// Remplacez YOUR_API_KEY par votre clé API

// Envoi de la requête à l'API de NewsAPI
fetch(apiUrl).then(response => {
  // Récupération des données de la réponse
  return response.json();
}).then(data => {
  // Récupération des trois premiers liens de la section "Actualités"
  const newsLinks = data.articles.slice(0, 3).map(item => item.url);
  
  // Affichage des liens
  console.log(newsLinks);
});