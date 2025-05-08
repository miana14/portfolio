<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Données en dur pour les messages
    private $messages = [
        [
            'id' => 1,
            'name' => 'Jean Dupont',
            'email' => 'jean.dupont@example.com',
            'subject' => 'Proposition de collaboration',
            'content' => "Bonjour,\n\nJ'aimerais discuter d'une collaboration pour un projet web que je suis en train de développer. J'ai vu votre portfolio et je suis impressionné par la qualité de votre travail, en particulier le projet e-commerce que vous avez réalisé.\n\nMon projet consiste à créer une plateforme de mise en relation entre freelances et entreprises dans le domaine du design et du développement web. J'aurais besoin de vos compétences pour la partie frontend et l'intégration avec le backend.\n\nSeriez-vous disponible pour un appel cette semaine afin de discuter des détails du projet et de votre éventuelle participation ?\n\nVoici mes coordonnées :\nTéléphone : 06 12 34 56 78\nEmail : jean.dupont@example.com\n\nJe vous remercie d'avance pour votre réponse et reste à votre disposition pour toute information complémentaire.\n\nCordialement,\nJean Dupont",
            'date' => 'Aujourd\'hui, 12:42',
            'read' => true,
            'selected' => true
        ],
        [
            'id' => 2,
            'name' => 'Marie Martin',
            'email' => 'marie.martin@example.com',
            'subject' => 'Votre portfolio est impressionnant',
            'content' => "Bonjour,\n\nJe viens de visiter votre portfolio et je suis impressionnée par la qualité de votre travail. Vos designs sont vraiment élégants et modernes.\n\nJe travaille pour une agence de communication et nous recherchons actuellement un développeur web talentueux pour rejoindre notre équipe. Votre profil correspond parfaitement à ce que nous recherchons.\n\nSeriez-vous intéressé par une opportunité professionnelle dans notre agence ? Si oui, j'aimerais vous en dire plus sur le poste et notre entreprise.\n\nCordialement,\nMarie Martin\nResponsable RH",
            'date' => 'Hier, 15:30',
            'read' => false,
            'selected' => false
        ],
        [
            'id' => 3,
            'name' => 'Pierre Durand',
            'email' => 'pierre.durand@example.com',
            'subject' => 'Demande de contact',
            'content' => "Bonjour,\n\nJe souhaiterais vous contacter pour discuter d'un projet de site web pour mon entreprise. Nous sommes une startup dans le domaine de la santé et nous avons besoin d'un site vitrine professionnel.\n\nPouvez-vous me contacter par téléphone au 07 98 76 54 32 pour en discuter davantage ?\n\nMerci d'avance,\nPierre Durand",
            'date' => 'Il y a 2 jours',
            'read' => false,
            'selected' => false
        ],
        [
            'id' => 4,
            'name' => 'Sophie Leroy',
            'email' => 'sophie.leroy@example.com',
            'subject' => 'Question sur vos services',
            'content' => "Bonjour,\n\nJ'aimerais en savoir plus sur vos services de développement web. Quels sont vos tarifs pour la création d'un site e-commerce ?\n\nMerci,\nSophie",
            'date' => 'Il y a 5 jours',
            'read' => true,
            'selected' => false
        ],
        [
            'id' => 5,
            'name' => 'Thomas Bernard',
            'email' => 'thomas.bernard@example.com',
            'subject' => 'Offre d\'emploi',
            'content' => "Bonjour,\n\nNotre entreprise recherche un développeur avec votre profil pour un poste en CDI. Le poste est basé à Lyon et concerne le développement d'applications web avec Laravel et Vue.js.\n\nSi vous êtes intéressé, merci de me faire parvenir votre CV à jour.\n\nCordialement,\nThomas Bernard\nDirecteur technique",
            'date' => 'Il y a 1 semaine',
            'read' => true,
            'selected' => false
        ]
    ];

    /**
     * Affiche la liste des messages
     */
    public function index()
    {
        $messages = $this->messages;
        $selectedMessage = $this->findSelectedMessage();
        $unreadMessagesCount = $this->countUnreadMessages();
        
        return view('admin.messages.index', compact('messages', 'selectedMessage', 'unreadMessagesCount'));
    }

    /**
     * Affiche un message spécifique
     */
    public function show($id)
    {
        $message = $this->findMessage($id);
        $messages = $this->messages;
        $unreadMessagesCount = $this->countUnreadMessages();
        
        // Marquer comme lu
        if ($message) {
            $message['read'] = true;
        }
        
        return view('admin.messages.show', compact('message', 'messages', 'unreadMessagesCount'));
    }

    /**
     * Marque un message comme lu
     */
    public function markAsRead($id)
    {
        // Simuler le marquage comme lu
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message marqué comme lu');
    }

    /**
     * Supprime un message
     */
    public function destroy($id)
    {
        // Simuler la suppression
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message supprimé avec succès');
    }

    /**
     * Trouve un message par son ID
     */
    private function findMessage($id)
    {
        foreach ($this->messages as $message) {
            if ($message['id'] == $id) {
                return $message;
            }
        }
        
        abort(404);
    }

    /**
     * Trouve le message sélectionné par défaut
     */
    private function findSelectedMessage()
    {
        foreach ($this->messages as $message) {
            if ($message['selected']) {
                return $message;
            }
        }
        
        return $this->messages[0] ?? null;
    }

    /**
     * Compte les messages non lus
     */
    private function countUnreadMessages()
    {
        $count = 0;
        foreach ($this->messages as $message) {
            if (!$message['read']) {
                $count++;
            }
        }
        
        return $count;
    }
}