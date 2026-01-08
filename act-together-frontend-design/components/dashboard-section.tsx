import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Trophy, Flame, Calendar, ArrowRight, Star, Clock } from "lucide-react"

const recentEvents = [
  {
    title: "Nettoyage de Plage",
    date: "28 Jan 2026",
    points: 50,
    status: "completed",
  },
  {
    title: "Bénévolat à la Banque Alimentaire",
    date: "22 Jan 2026",
    points: 40,
    status: "completed",
  },
  {
    title: "Session de Tutorat Jeunesse",
    date: "15 Jan 2026",
    points: 35,
    status: "completed",
  },
]

const badges = [
  { name: "Première Fois", icon: Star, color: "text-secondary" },
  { name: "Éco Guerrier", icon: Flame, color: "text-accent" },
  { name: "Héros Communautaire", icon: Trophy, color: "text-primary" },
]

export function DashboardSection() {
  return (
    <section id="dashboard" className="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-muted/50">
      <div className="max-w-7xl mx-auto">
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
            <Trophy className="w-4 h-4" />
            <span>Votre Progression</span>
          </div>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4 text-balance">Tableau de Bord Étudiant</h2>
          <p className="text-muted-foreground leading-relaxed">
            Suivez votre parcours de bénévolat, gagnez des points et débloquez des récompenses.
          </p>
        </div>

        {/* Dashboard Preview */}
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <Card className="border-0 shadow-sm lg:col-span-1">
            <CardHeader className="pb-2">
              <CardDescription className="text-sm">Points Totaux</CardDescription>
              <CardTitle className="text-4xl font-bold text-primary">1 250</CardTitle>
            </CardHeader>
            <CardContent>
              <div className="flex items-center gap-2 text-sm text-muted-foreground mb-4">
                <Flame className="w-4 h-4 text-secondary" />
                <span>Série de 5 événements</span>
              </div>
              <div className="space-y-3">
                <div>
                  <div className="flex items-center justify-between text-sm mb-1">
                    <span className="text-muted-foreground">Progression du Niveau</span>
                    <span className="font-medium text-foreground">Or (1 250/1 500)</span>
                  </div>
                  <div className="h-2 bg-muted rounded-full overflow-hidden">
                    <div className="h-full bg-primary rounded-full w-[83%]" />
                  </div>
                </div>
              </div>
              <div className="flex gap-2 mt-4">
                {badges.map((badge) => (
                  <div
                    key={badge.name}
                    className="flex items-center justify-center w-10 h-10 rounded-full bg-muted"
                    title={badge.name}
                  >
                    <badge.icon className={`w-5 h-5 ${badge.color}`} />
                  </div>
                ))}
              </div>
            </CardContent>
          </Card>

          <Card className="border-0 shadow-sm lg:col-span-2">
            <CardHeader>
              <div className="flex items-center justify-between">
                <CardTitle className="text-lg">Activité Récente</CardTitle>
                <Button variant="ghost" size="sm" className="gap-1 text-primary">
                  Voir Tout <ArrowRight className="w-4 h-4" />
                </Button>
              </div>
            </CardHeader>
            <CardContent>
              <div className="space-y-4">
                {recentEvents.map((event, index) => (
                  <div
                    key={index}
                    className="flex items-center justify-between p-3 rounded-lg bg-muted/50 hover:bg-muted transition-colors"
                  >
                    <div className="flex items-center gap-3">
                      <div className="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center">
                        <Calendar className="w-5 h-5 text-primary" />
                      </div>
                      <div>
                        <p className="font-medium text-foreground text-sm">{event.title}</p>
                        <div className="flex items-center gap-1 text-xs text-muted-foreground">
                          <Clock className="w-3 h-3" />
                          <span>{event.date}</span>
                        </div>
                      </div>
                    </div>
                    <div className="flex items-center gap-3">
                      <Badge variant="secondary" className="bg-accent/10 text-accent border-0">
                        +{event.points} pts
                      </Badge>
                    </div>
                  </div>
                ))}
              </div>

              <div className="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-border">
                <div className="text-center">
                  <p className="text-2xl font-bold text-foreground">12</p>
                  <p className="text-xs text-muted-foreground">Événements Rejoints</p>
                </div>
                <div className="text-center">
                  <p className="text-2xl font-bold text-foreground">48</p>
                  <p className="text-xs text-muted-foreground">Heures de Bénévolat</p>
                </div>
                <div className="text-center">
                  <p className="text-2xl font-bold text-foreground">3</p>
                  <p className="text-xs text-muted-foreground">Badges Gagnés</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>

        <div className="text-center mt-10">
          <Button size="lg" className="gap-2">
            Inscrivez-vous pour Suivre Votre Progression
            <ArrowRight className="w-4 h-4" />
          </Button>
        </div>
      </div>
    </section>
  )
}
