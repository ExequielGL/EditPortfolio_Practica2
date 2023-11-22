import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import Profile from '../../models/profile.model';
import { ProfileService } from '../../services/profile.service';

@Component({
  selector: 'app-social-networks',
  templateUrl: './social-networks.component.html',
  styleUrl: './social-networks.component.css'
})
export class SocialNetworksComponent {
  @Input() socialNetworks!: Profile['user']['social_network'];

  formulario = {
    social_networks: [] as any
  };
  editing = false;

  constructor(private profileService: ProfileService) { }

  ngOnChanges(changes: SimpleChanges) {
    if (changes['socialNetworks']) {
      this.formulario.social_networks = this.socialNetworks.map(network => ({
        id: network.id,
        name: network.name
      }));
    }
  }

  toggleEdit() {
    this.editing = !this.editing;
    if (!this.editing) {
      this.saveChanges();
    }
  }

  saveChanges() {
    this.profileService.updateSocialNetworks(this.formulario.social_networks).subscribe({
      next: response => {
        console.log(response);
      },
      error: error => {
        console.error(error);
      }
    });
  }
}
