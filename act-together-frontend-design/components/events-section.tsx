"use client"

import Image from "next/image"
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card"
import { Button } from "@/components/ui/button"
import { Badge } from "@/components/ui/badge"
import { Calendar, MapPin, Clock, Star } from "lucide-react"

const events = [
  {
    id: 1,
    title: "Nettoyage de Plage",
    description:
      "Rejoignez-nous pour une matinée d'action environnementale. Aidez à nettoyer nos plages locales et protéger la vie marine.",
    date: "15 Fév 2026",
    time: "9h00 - 12h00",
    location: "Plage de Santa Monica",
    points: 50,
    category: "Environnement",
    image: "/volunteers-cleaning-beach-with-ocean-waves.jpg",
  },
  {
    id: 2,
    title: "Bénévolat à la Banque Alimentaire",
    description:
      "Aidez à trier et distribuer des colis alimentaires aux familles dans le besoin à la banque alimentaire communautaire.",
    date: "18 Fév 2026",
    time: "14h00 - 17h00",
    location: "Centre Communautaire du Centre-Ville",
    points: 40,
    category: "Communauté",
    image: "/volunteers-sorting-food-packages-at-food-bank.jpg",
  },
  {
    id: 3,
    title: "Session de Tutorat Jeunesse",
    description:
      "Partagez vos connaissances et aidez les jeunes étudiants avec leurs devoirs et préparation aux examens.",
    date: "20 Fév 2026",
    time: "16h00 - 18h00",
    location: "Bibliothèque Publique Municipale",
    points: 35,
    category: "Éducation",
    image: "/tutor-helping-student-with-books-in-library.jpg",
  },
  {
    id: 4,
    title: "Visite en Maison de Retraite",
    description:
      "Passez du temps de qualité avec les personnes âgées. Activités incluant jeux de société et conversations.",
    date: "22 Fév 2026",
    time: "10h00 - 13h00",
    location: "Résidence Soleil Levant",
    points: 45,
    category: "Santé",
    image: "/young-volunteer-playing-board-games-with-elderly-p.jpg",
  },
  {
    id: 5,
    title: "Initiative de Plantation d'Arbres",
    description:
      "Aidez à planter 100 arbres dans le parc municipal dans le cadre de notre initiative de verdissement urbain.",
    date: "25 Fév 2026",
    time: "8h00 - 11h00",
    location: "Parc Central de la Ville",
    points: 55,
    category: "Environnement",
    image: "/group-of-volunteers-planting-trees-in-park.jpg",
  },
  {
    id: 6,
    title: "Soutien au Refuge Animalier",
    description: "Aidez à promener les chiens, nettoyer les enclos et participer aux événements d'adoption.",
    date: "28 Fév 2026",
    time: "13h00 - 16h00",
    location: "Refuge Les Pattes Joyeuses",
    points: 40,
    category: "Animaux",
    image: "/volunteer-walking-dogs-at-animal-shelter.jpg",
  },
]

export function EventsSection() {
  const handleParticipate = (eventTitle: string) => {
    alert(`Merci pour votre intérêt pour "${eventTitle}" ! La fonctionnalité d'inscription arrive bientôt.`)
  }

  return (
    <section id="events" className="py-16 md:py-24 px-4 sm:px-6 lg:px-8">
      <div className="max-w-7xl mx-auto">
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
            <Calendar className="w-4 h-4" />
            <span>Événements à Venir</span>
          </div>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4 text-balance">
            Trouvez Votre Prochaine Opportunité
          </h2>
          <p className="text-muted-foreground leading-relaxed">
            Découvrez des événements de bénévolat significatifs dans votre région et commencez à faire la différence dès
            aujourd'hui.
          </p>
        </div>

        {/* Events Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {events.map((event) => (
            <Card
              key={event.id}
              className="border shadow-sm hover:shadow-md transition-shadow flex flex-col overflow-hidden"
            >
              <div className="relative h-48 w-full">
                <Image src={event.image || "/placeholder.svg"} alt={event.title} fill className="object-cover" />
                <div className="absolute top-3 left-3">
                  <Badge variant="secondary" className="bg-background/90 backdrop-blur-sm text-xs">
                    {event.category}
                  </Badge>
                </div>
                <div className="absolute top-3 right-3 flex items-center gap-1 bg-background/90 backdrop-blur-sm px-2 py-1 rounded-full text-secondary">
                  <Star className="w-3.5 h-3.5 fill-current" />
                  <span className="text-xs font-semibold">{event.points} pts</span>
                </div>
              </div>
              <CardHeader className="pb-3">
                <CardTitle className="text-lg">{event.title}</CardTitle>
              </CardHeader>
              <CardContent className="flex-1">
                <CardDescription className="text-sm leading-relaxed mb-4">{event.description}</CardDescription>
                <div className="space-y-2 text-sm text-muted-foreground">
                  <div className="flex items-center gap-2">
                    <Calendar className="w-4 h-4 text-primary" />
                    <span>{event.date}</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <Clock className="w-4 h-4 text-primary" />
                    <span>{event.time}</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <MapPin className="w-4 h-4 text-primary" />
                    <span>{event.location}</span>
                  </div>
                </div>
              </CardContent>
              <CardFooter className="pt-4">
                <Button className="w-full" onClick={() => handleParticipate(event.title)}>
                  Participer
                </Button>
              </CardFooter>
            </Card>
          ))}
        </div>

        <div className="text-center mt-10">
          <Button variant="outline" size="lg">
            Voir Tous les Événements
          </Button>
        </div>
      </div>
    </section>
  )
}
