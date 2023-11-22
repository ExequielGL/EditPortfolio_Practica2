interface Interest {
    id: number;
    activity: string;
    user_id: number;
  }
  
  interface SocialNetwork {
    id: number;
    name: string;
    page_url: string;
    path_img: string;
    user_id: number;
  }
  
  interface Framework {
    id: number;
    name: string;
    knowledge: string;
    user_id: number;
  }
  
  interface PersonalData {
    id: number;
    age: number;
    email: string;
    origin_city: string;
    origin_country: string;
    user_id: number;
  }
  
  interface User {
    id: number;
    name: string;
    description: string;
    personal_data: PersonalData;
    interest: Interest[];
    social_network: SocialNetwork[];
    framework: Framework[];
  }
  
  interface Profile {
    user: User;
  }
  
  export default Profile;