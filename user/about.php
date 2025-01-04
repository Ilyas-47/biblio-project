<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="../css/about.css">
 <?php include('../includes/nav.php')?>

    <!-- Section FAQ -->
    <section class="faq-section">
        <div class="container">
            <h1 class="faq-title">Frequently Asked Questions</h1>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Comment puis-je m'inscrire à BookBazaar ?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Pour vous inscrire, cliquez sur le bouton "S'inscrire" en haut à droite de la page. Remplissez le formulaire avec vos informations personnelles et suivez les instructions pour finaliser votre inscription.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Comment puis-je rechercher un livre dans votre collection ?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                <p>Vous pouvez utiliser la barre de recherche en haut de la page pour entrer le titre, l'auteur ou le genre du livre que vous cherchez. Les résultats de la recherche s'afficheront automatiquement.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Quels sont les modes de paiement disponibles sur BookBazaar ?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Nous acceptons les paiements par carte bancaire, PayPal et virement bancaire. Vous pouvez choisir votre mode de paiement préféré lors du processus de commande.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Comment puis-je suivre ma commande ?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Une fois votre commande expédiée, vous recevrez un e-mail avec un lien de suivi. Vous pourrez suivre l'avancement de la livraison sur le site de notre partenaire de transport.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Puis-je retourner un livre si je ne suis pas satisfait ?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Oui, nous acceptons les retours dans un délai de 30 jours après réception de votre commande. Le livre doit être en bon état et dans son emballage d'origine. Veuillez consulter notre politique de retour pour plus d'informations.</p>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include('../includes/footer.php')?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('i');

                // Basculer l'affichage de la réponse
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    answer.style.display = 'block';
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });
        });
    });
</script>
</html>
