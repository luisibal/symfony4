<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Set Video Title',
                // 'data' => 'Example title',
                'required' => false,
            ])

            ->add('filename', TextType::class, [
                'label' => 'Set Video File Name',
                'data' => 'video.mp4',
                'required' => false,
            ])
            ->add('size', NumberType::class, [
                'label' => 'Set size',
                'data' => '500',
                'required' => false,
            ])
            ->add('description', TextType::class, [
                'label' => 'Set Video Description',
                'data' => 'descr',
                'required' => false,
            ])
            ->add('format', TextType::class, [
                'label' => 'Set Video format',
                'data' => 'mp4',
                'required' => false,
            ])
            ->add('duration', NumberType::class, [
                'label' => 'Set Duration',
                'data' => '500',
                'required' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Agree ?',
                'mapped' => false
            ])
            ->add('file', FileType::class, [
                'label' => 'Video (MP4 file)'
            ])
            // ->add('author')
            ->add('save', SubmitType::class, ['label' => 'Add a Video']);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $video = $event->getData();
            $form = $event->getForm();
            if (!$video || null === $video->getId()) {
                $form->add('created_at', DateType::class, [
                    'label' => 'Set date',
                    'widget' => 'single_text'
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
