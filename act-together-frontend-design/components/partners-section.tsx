"use client"

import Image from "next/image"
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from "@/components/ui/carousel"
import Autoplay from "embla-carousel-autoplay"
import { useRef } from "react"
import { Handshake } from "lucide-react"

const partners = [
  {
    id: 1,
    name: "Fondation Impact Global",
    logo: "/global-impact-foundation-nonprofit-logo.jpg",
  },
  {
    id: 2,
    name: "Initiative ÉcoMonde",
    logo: "/ecoworld-green-environmental-logo.jpg",
  },
  {
    id: 3,
    name: "Banque Communauté Première",
    logo: "/community-first-bank-corporate-logo.jpg",
  },
  {
    id: 4,
    name: "TechPourLeBien",
    logo: "/techforgood-technology-company-logo.jpg",
  },
  {
    id: 5,
    name: "Partenaires Santé Unis",
    logo: "/united-health-partners-healthcare-logo.jpg",
  },
  {
    id: 6,
    name: "Alliance Éducation",
    logo: "/education-alliance-education-nonprofit-logo.jpg",
  },
  {
    id: 7,
    name: "Avenir Vert Corp",
    logo: "/green-future-corp-sustainability-logo.jpg",
  },
  {
    id: 8,
    name: "Réseau Bénévoles",
    logo: "/volunteer-network-community-organization-logo.jpg",
  },
]

export function PartnersSection() {
  const plugin = useRef(Autoplay({ delay: 2000, stopOnInteraction: true }))

  return (
    <section className="py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-muted/30">
      <div className="max-w-7xl mx-auto">
        <div className="text-center max-w-2xl mx-auto mb-12">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-medium mb-4">
            <Handshake className="w-4 h-4" />
            <span>Nos Partenaires</span>
          </div>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4 text-balance">
            Approuvés par des Organisations de Premier Plan
          </h2>
          <p className="text-muted-foreground leading-relaxed">
            Nous collaborons avec des entreprises et des associations qui partagent notre vision de créer un changement
            positif dans les communautés.
          </p>
        </div>

        {/* Partners Carousel */}
        <div className="px-12">
          <Carousel
            opts={{
              align: "start",
              loop: true,
            }}
            plugins={[plugin.current]}
            className="w-full"
          >
            <CarouselContent className="-ml-4">
              {partners.map((partner) => (
                <CarouselItem key={partner.id} className="pl-4 basis-1/2 md:basis-1/3 lg:basis-1/4">
                  <div className="flex items-center justify-center h-28 p-6 bg-background rounded-lg border hover:shadow-md transition-shadow">
                    <Image
                      src={partner.logo || "/placeholder.svg"}
                      alt={partner.name}
                      width={160}
                      height={60}
                      className="object-contain grayscale hover:grayscale-0 transition-all opacity-70 hover:opacity-100"
                    />
                  </div>
                </CarouselItem>
              ))}
            </CarouselContent>
            <CarouselPrevious />
            <CarouselNext />
          </Carousel>
        </div>
      </div>
    </section>
  )
}
