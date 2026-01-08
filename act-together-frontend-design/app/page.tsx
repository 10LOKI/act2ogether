import { Navbar } from "@/components/navbar"
import { HeroSection } from "@/components/hero-section"
import { ImpactSection } from "@/components/impact-section"
import { EventsSection } from "@/components/events-section"
import { PartnersSection } from "@/components/partners-section"
import { DashboardSection } from "@/components/dashboard-section"
import { Footer } from "@/components/footer"

export default function Home() {
  return (
    <main className="min-h-screen">
      <Navbar />
      <HeroSection />
      <ImpactSection />
      <EventsSection />
      <PartnersSection />
      <DashboardSection />
      <Footer />
    </main>
  )
}
