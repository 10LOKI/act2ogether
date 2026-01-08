import { Button } from "@/components/ui/button"
import { ArrowRight, Heart, Users, Trophy } from "lucide-react"

export function HeroSection() {
  return (
    <section id="about" className="pt-24 pb-16 md:pt-32 md:pb-24 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="text-center max-w-3xl mx-auto">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium mb-6">
            <Heart className="w-4 h-4" />
            <span>Plateforme de Bénévolat Étudiant</span>
          </div>

          <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-6 text-balance leading-tight">
            Engagez-vous, Gagnez, <span className="text-primary">Impactez</span>
          </h1>

          <p className="text-lg md:text-xl text-muted-foreground mb-8 leading-relaxed text-pretty max-w-2xl mx-auto">
            Rejoignez des milliers d'étudiants qui font la différence. Découvrez des événements de bénévolat, gagnez des
            récompenses pour vos contributions et suivez votre impact communautaire.
          </p>

          <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
            <Button size="lg" className="w-full sm:w-auto gap-2" asChild>
              <a href="#events">
                Trouver des Événements
                <ArrowRight className="w-4 h-4" />
              </a>
            </Button>
            <Button variant="outline" size="lg" className="w-full sm:w-auto bg-transparent">
              En Savoir Plus
            </Button>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-8 mt-12 pt-8 border-t border-border">
            <div className="flex items-center gap-2">
              <Users className="w-5 h-5 text-primary" />
              <span className="text-sm text-muted-foreground">
                <span className="font-semibold text-foreground">2 500+</span> Étudiants Actifs
              </span>
            </div>
            <div className="flex items-center gap-2">
              <Heart className="w-5 h-5 text-accent" />
              <span className="text-sm text-muted-foreground">
                <span className="font-semibold text-foreground">150+</span> Organisations Partenaires
              </span>
            </div>
            <div className="flex items-center gap-2">
              <Trophy className="w-5 h-5 text-secondary" />
              <span className="text-sm text-muted-foreground">
                <span className="font-semibold text-foreground">10 000+</span> Heures de Bénévolat
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
