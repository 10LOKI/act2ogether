import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import { TrendingUp, AlertTriangle, Lightbulb } from "lucide-react"

const stats = [
  {
    label: "Programmes Structurés",
    value: 75,
    color: "bg-primary",
    description: "des étudiants préfèrent le bénévolat organisé",
  },
  {
    label: "Engagement Informel",
    value: 45,
    color: "bg-accent",
    description: "participent à l'aide communautaire informelle",
  },
  {
    label: "Écart d'Engagement",
    value: 60,
    color: "bg-secondary",
    description: "veulent faire du bénévolat mais manquent d'opportunités",
  },
  {
    label: "Taux de Rétention",
    value: 85,
    color: "bg-primary",
    description: "reviennent pour plusieurs événements",
  },
]

const insights = [
  {
    icon: AlertTriangle,
    title: "Obstacles à l'Entrée",
    description:
      "De nombreux étudiants font face à des contraintes de temps, un manque de sensibilisation et des difficultés à trouver des opportunités pertinentes.",
    color: "text-secondary",
  },
  {
    icon: TrendingUp,
    title: "Intérêt Croissant",
    description:
      "L'intérêt des étudiants pour l'impact social a augmenté de 40% d'une année sur l'autre, notamment pour les causes environnementales.",
    color: "text-primary",
  },
  {
    icon: Lightbulb,
    title: "La Gamification Fonctionne",
    description:
      "Les plateformes avec des points et des récompenses constatent un taux d'engagement et de rétention 3 fois plus élevé.",
    color: "text-accent",
  },
]

export function ImpactSection() {
  return (
    <section id="impact" className="py-16 md:py-24 px-4 sm:px-6 lg:px-8 bg-muted/50">
      <div className="max-w-7xl mx-auto">
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
            <TrendingUp className="w-4 h-4" />
            <span>Métriques d'Impact</span>
          </div>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4 text-balance">
            Comprendre l'Engagement Étudiant
          </h2>
          <p className="text-muted-foreground leading-relaxed">
            Des insights basés sur les données concernant les habitudes de bénévolat et les défis d'engagement des
            étudiants.
          </p>
        </div>

        {/* Bar Charts */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
          {stats.map((stat) => (
            <Card key={stat.label} className="border-0 shadow-sm">
              <CardContent className="pt-6">
                <div className="mb-4">
                  <div className="flex items-end justify-between mb-2">
                    <span className="text-3xl font-bold text-foreground">{stat.value}%</span>
                  </div>
                  <div className="h-3 bg-muted rounded-full overflow-hidden">
                    <div
                      className={`h-full ${stat.color} rounded-full transition-all duration-1000`}
                      style={{ width: `${stat.value}%` }}
                    />
                  </div>
                </div>
                <h3 className="font-semibold text-foreground text-sm mb-1">{stat.label}</h3>
                <p className="text-xs text-muted-foreground">{stat.description}</p>
              </CardContent>
            </Card>
          ))}
        </div>

        {/* Insights Cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {insights.map((insight) => (
            <Card key={insight.title} className="border-0 shadow-sm">
              <CardHeader>
                <div className={`w-10 h-10 rounded-lg bg-muted flex items-center justify-center mb-2`}>
                  <insight.icon className={`w-5 h-5 ${insight.color}`} />
                </div>
                <CardTitle className="text-lg">{insight.title}</CardTitle>
              </CardHeader>
              <CardContent>
                <CardDescription className="text-sm leading-relaxed">{insight.description}</CardDescription>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </section>
  )
}
