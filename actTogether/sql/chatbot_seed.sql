-- Seed data Chatbot
USE acttogether;

INSERT INTO reponses_automatiques (mots_cles, reponse, suggestions, categorie, priorite) VALUES

-- Salutations
('["salam", "bonjour", "salut", "hello", "salam alikoum"]', 
'السلام عليكم! 👋 Bienvenue sur actTogether. Comment puis-je vous aider aujourd''hui ?', 
'["Comment ça marche?", "Voir les événements", "S''inscrire", "Parler à un humain"]',
'salutation', 10),

-- Inscription
('["inscription", "inscrire", "créer compte", "register", "nsajal"]',
'Pour vous inscrire sur actTogether, c''est simple! 📝\n\n1. Cliquez sur "S''inscrire"\n2. Remplissez vos informations\n3. Validez votre compte\n\nVous voulez que je vous redirige?',
'["Oui, m''inscrire maintenant", "Comment gagner des points?", "Voir les événements"]',
'inscription', 9),

-- Points
('["points", "récompenses", "gagner", "nukaat", "cadeau"]',
'Vous gagnez des points en participant aux événements! 🎁\n\n✅ +50 points par événement\n✅ Échangez contre des récompenses\n\nConsultez votre dashboard pour voir votre solde.',
'["Voir les récompenses", "Comment participer?", "Mes points actuels"]',
'points', 8),

-- Événements
('["événement", "événements", "participer", "bénévolat", "tatawu3"]',
'Nous organisons des événements solidaires! 📅\n\n🌊 Nettoyage environnemental\n🍲 Distribution alimentaire\n📚 Aide scolaire\n\nVoulez-vous voir les prochains événements?',
'["Oui, voir les événements", "Comment s''inscrire?", "Conditions"]',
'evenements', 9),

-- Partenaires
('["partenaires", "sponsors", "entreprises", "mcdonald", "fnac"]',
'Nos partenaires soutiennent votre engagement! 🤝\n\n🍔 McDonald''s\n📚 Fnac\n🛒 Marjane\n📱 Inwi\n\nIls offrent des récompenses exclusives.',
'["Voir récompenses", "Devenir partenaire", "Échanger points"]',
'partenaires', 7),

-- Contact humain
('["humain", "personne", "admin", "aide", "3awni", "mosa3ada"]',
'Je vais transférer votre demande! 👨💼\n\n📧 contact@acttogether.ma\n📞 +212 5XX-XXXXXX\n\nLaissez votre message, nous répondrons rapidement.',
'["Laisser un message", "Voir FAQ", "Retour au menu"]',
'contact_admin', 10),

-- Problème technique
('["problème", "bug", "erreur", "marche pas", "mushkil"]',
'Désolé pour ce désagrément! 😔\n\n1. Videz votre cache\n2. Reconnectez-vous\n3. Essayez autre navigateur\n\nSi ça persiste, contactez le support.',
'["Contacter support", "FAQ technique", "Retour menu"]',
'technique', 8),

-- FAQ
('["comment", "pourquoi", "kifach", "3lach", "info"]',
'Je suis là pour vous aider! 🤗\n\nSujets populaires:\n• Gagner des points\n• Événements disponibles\n• Échanger récompenses\n• Partenaires\n\nQue voulez-vous savoir?',
'["Gagner points", "Voir événements", "Partenaires", "Parler à quelqu''un"]',
'faq', 5);