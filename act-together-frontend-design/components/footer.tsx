import { Heart, Mail, MapPin, Phone, Twitter, Instagram, Linkedin, Github } from "lucide-react"

const footerLinks = {
  platform: [
    { label: "Trouver des Événements", href: "#events" },
    { label: "Tableau de Bord", href: "#dashboard" },
    { label: "Récompenses", href: "#" },
    { label: "Classement", href: "#" },
  ],
  resources: [
    { label: "Centre d'Aide", href: "#" },
    { label: "Blog", href: "#" },
    { label: "Devenir Partenaire", href: "#" },
    { label: "Pour les Organisations", href: "#" },
  ],
  company: [
    { label: "À Propos", href: "#about" },
    { label: "Carrières", href: "#" },
    { label: "Politique de Confidentialité", href: "#" },
    { label: "Conditions d'Utilisation", href: "#" },
  ],
}

const socialLinks = [
  { icon: Twitter, href: "#", label: "Twitter" },
  { icon: Instagram, href: "#", label: "Instagram" },
  { icon: Linkedin, href: "#", label: "LinkedIn" },
  { icon: Github, href: "#", label: "GitHub" },
]

export function Footer() {
  return (
    <footer className="bg-foreground text-background py-12 md:py-16 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12">
          <div className="lg:col-span-2">
            <div className="flex items-center gap-2 mb-4">
              <div className="w-8 h-8 rounded-lg bg-primary flex items-center justify-center">
                <span className="text-primary-foreground font-bold text-sm">AT</span>
              </div>
              <span className="font-bold text-xl">actTogether</span>
            </div>
            <p className="text-background/70 text-sm leading-relaxed mb-6 max-w-sm">
              Connecter les étudiants avec des opportunités de bénévolat significatives. Gagnez des points, suivez votre
              impact et faites la différence dans votre communauté.
            </p>
            <div className="space-y-2 text-sm text-background/70">
              <div className="flex items-center gap-2">
                <Mail className="w-4 h-4" />
                <span>bonjour@acttogether.org</span>
              </div>
              <div className="flex items-center gap-2">
                <Phone className="w-4 h-4" />
                <span>+33 1 23 45 67 89</span>
              </div>
              <div className="flex items-center gap-2">
                <MapPin className="w-4 h-4" />
                <span>Paris, France</span>
              </div>
            </div>
          </div>

          <div>
            <h4 className="font-semibold text-sm mb-4">Plateforme</h4>
            <ul className="space-y-2">
              {footerLinks.platform.map((link) => (
                <li key={link.label}>
                  <a href={link.href} className="text-sm text-background/70 hover:text-background transition-colors">
                    {link.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="font-semibold text-sm mb-4">Ressources</h4>
            <ul className="space-y-2">
              {footerLinks.resources.map((link) => (
                <li key={link.label}>
                  <a href={link.href} className="text-sm text-background/70 hover:text-background transition-colors">
                    {link.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h4 className="font-semibold text-sm mb-4">Entreprise</h4>
            <ul className="space-y-2">
              {footerLinks.company.map((link) => (
                <li key={link.label}>
                  <a href={link.href} className="text-sm text-background/70 hover:text-background transition-colors">
                    {link.label}
                  </a>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="mt-12 pt-8 border-t border-background/10 flex flex-col sm:flex-row items-center justify-between gap-4">
          <div className="flex items-center gap-1 text-sm text-background/70">
            <span>Fait avec</span>
            <Heart className="w-4 h-4 text-primary fill-primary" />
            <span>pour les étudiants partout</span>
          </div>
          <div className="flex items-center gap-4">
            {socialLinks.map((social) => (
              <a
                key={social.label}
                href={social.href}
                className="w-8 h-8 rounded-full bg-background/10 flex items-center justify-center hover:bg-background/20 transition-colors"
                aria-label={social.label}
              >
                <social.icon className="w-4 h-4" />
              </a>
            ))}
          </div>
        </div>
      </div>
    </footer>
  )
}
